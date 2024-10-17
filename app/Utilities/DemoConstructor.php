<?php

namespace App\Utilities;

class DemoConstructor
{
    public $name;
    public $age;

    // Constructor to initialize name and age
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getDetails()
    {
        return "Name: $this->name, Age: $this->age";
    }
}
