<?php

namespace App\Utilities;

class ChildClass extends BaseClass
{
    // Override the displayMessage method
    public function displayMessage()
    {
        return "Message from the Child Class.";
    }

    // A method to demonstrate calling parent class method
    public function callParentMessage()
    {
        return parent::displayMessage(); // Call the parent class's method
    }
}
