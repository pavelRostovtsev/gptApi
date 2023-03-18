<?php

namespace TestData;

use InvalidArgumentException;

class Calculator
{
    public function add($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Arguments must be numeric.");
        }

        return $a + $b;
    }

    public function subtract($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Arguments must be numeric.");
        }

        return $a - $b;
    }

    public function multiply($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Arguments must be numeric.");
        }

        return $a * $b;
    }

    public function divide($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Arguments must be numeric.");
        }

        if ($b == 0) {
            throw new InvalidArgumentException("Cannot divide by zero.");
        }

        return $a / $b;
    }
}
