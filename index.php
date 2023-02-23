<?php
//This is my CONTROLLER for the diner project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);



//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');
//require_once('classes/order.php');

//start a session
session_start();
//var_dump($_SESSION);

//$myOrder = new Order();
//$myOrder->setFood("tacos");
//echo $myOrder->getFood();
//var_dump($myOrder);

//$food1 = "tacos";
//$food2 = "";
//$food3 = "x";
//echo validFood($food1) ? "valid" : "not valid";
//echo validFood($food2) ? "valid" : "not valid";
//echo validFood($food3) ? "valid" : "not valid";
//getMeal();
//getCondiments();

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

//Define a default route (328/diner/order-form1)
$f3->route('GET|POST /order12', function ($f3){

    //var_dump($_POST);
    //array(2) { ["food"]=> string(5) "pizza" ["meal"]=> string(6) "dinner" }

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $newOrder = new Order();

        //Move data from POST array to SESSION array
        $food = trim($_POST['food']);
        if(validFood($food)){
            $newOrder->setFood($food);
        }else{
            $f3 -> set('errors["food"]', 'Food must have at least 2 chars');
        }

        //Validate the meal
        $meal = $_POST['meal'];
        if(validMead($meal)){
            $newOrder->setMeal($meal);
        }else{
            $f3->set('errors["meal"]', 'Meal is invalid');
        }



//        $_SESSION['food'] = $_POST['food'];
//        $_SESSION['meal'] = $_POST['meal'];

        if(empty($f3->get('errors'))){
            $_SESSION['newOrder'] = $newOrder;
            //redirect to summary page
            $f3->reroute('order2');
        }

    }

    //Add meals to F3 hive
    $f3->set("meals", getMeal());

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/order-form1.html");
});


//Define a default route (328/diner/order-form2)
$f3->route('GET|POST /order2', function ($f3){

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        //Move data from POST array to SESSION array

//        $newOrder = $_SESSION['newOrder'];
//        $condString = implode(", ",$_POST['conds']);
//        $newOrder->setCondiments($condString);
//        $_SESSION['newOrder'] = $newOrder;

        //Move data from
        $condString = implode(", ",$_POST['conds']);
        $_SESSION['newOrder']->setCondiments($condString);

        //Move data from POST
//        $_SESSION['food'] = $_POST['food'];
//        $_SESSION['meal'] = $_POST['meal'];

        //redirect to summary page
        $f3->reroute('summary');
    }

    //Add condiments to F3 hive
    $f3->set("condiments", getCondiments());

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/order-form2.html");
});


//Define a default route (328/diner/order-summary)
$f3->route('GET /summary', function (){

    //Write to Database


    //Instantiate a view
    $view = new Template();
    echo $view->render("views/order-summary.html");

    //Destroy session array
    sessson_destroy();
});


//Run Fat-Free
$f3->run();
//Java -> f3.run();