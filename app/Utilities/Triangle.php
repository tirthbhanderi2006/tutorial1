<?php
namespace App\Utilities;


class Triangle extends Shape
{
    protected $base;
    protected $height;

    // Constructor to initialize base and height
    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    // Implement calculateArea method
    public function calculateArea()
    {
        return 0.5 * $this->base * $this->height;
    }
}