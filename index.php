<?php
//This is my CONTROLLER for the pets project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
//Java equivalent -> Base f3 = new Base();

//Define a default route ("homepage" for hello project)
$f3->route('GET /', function (){

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/diner-home.html");
});

//Define a default route (328/diner/breakfast)
$f3->route('GET /breakfast', function (){

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/breakfast.html");
});

//Define a default route (328/diner/lunch)
$f3->route('GET /lunch', function (){

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/lunch.html");
});


//Run Fat-Free
$f3->run();
//Java -> f3.run();