<?php
namespace App\Utilities;

class a_rectangle extends Shape
{
    protected $length;
    protected $width;

    // Constructor to initialize length and width
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    // Implement calculateArea method
    public function calculateArea()
    {
        return $this->length * $this->width;
    }
}