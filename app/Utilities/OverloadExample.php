<?php

namespace App\Utilities;

class OverloadExample
{
    // This will catch all calls to undefined or overloaded methods
    public function __call($method, $arguments)
    {
        // Handle method 'sum' with varying number of arguments
        if ($method == 'sum') {
            switch (count($arguments)) {
                case 2:
                    return $this->sumTwoNumbers($arguments[0], $arguments[1]);
                case 3:
                    return $this->sumThreeNumbers($arguments[0], $arguments[1], $arguments[2]);
                default:
                    return "Invalid number of arguments for sum() method.";
            }
        }

        return "Method $method does not exist.";
    }

    // Sum two numbers
    private function sumTwoNumbers($a, $b)
    {
        return $a + $b;
    }

    // Sum three numbers
    private function sumThreeNumbers($a, $b, $c)
    {
        return $a + $b + $c;
    }
}
