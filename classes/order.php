<?php
/**
 * Order class represents an order from my diner
 * @Bao Huynh
 */

class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    function __construct()
    {
        $this->_food = "";
        $this->_meal = "";
        $this->_condiments = "";
    }

    /**
     * getFood returns the food item orders
     * @return string
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * setFood sets a food item in the order
     * @param string
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * getMeal returns the meal item orders
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * setMeal sets a meal item in the order
     * @param string
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * getcondiments returns the condiments item orders
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * setCondiments sets a condiments item in the order
     * @param string
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }
}