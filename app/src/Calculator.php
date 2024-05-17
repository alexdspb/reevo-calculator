<?php

class Calculator
{
    public function calculate(string $input): float
    {
        $input = trim($input);
        if (preg_match('/^\d+(\.\d+)?\s*\+\s*\d+(\.\d+)?$/', $input)) {
            list($a, $b) = explode('+', $input);
            return $this->add(trim($a), trim($b));
        } elseif (preg_match('/^\d+(\.\d+)?\s*\-\s*\d+(\.\d+)?$/', $input)) {
            list($a, $b) = explode('-', $input);
            return $this->subtract(trim($a), trim($b));
        } elseif (preg_match('/^\d+(\.\d+)?\s*\*\s*\d+(\.\d+)?$/', $input)) {
            list($a, $b) = explode('*', $input);
            return $this->multiply(trim($a), trim($b));
        } elseif (preg_match('/^\d+(\.\d+)?\s*\/\s*\d+(\.\d+)?$/', $input)) {
            list($a, $b) = explode('/', $input);
            return $this->divide(trim($a), trim($b));
        } elseif (preg_match('/^\d+(\.\d+)?\s*sqrt$/', $input)) {
            list($a) = explode(' ', $input);
            return $this->sqrt(trim($a));
        } else {
            throw new InvalidArgumentException('Invalid input.');
        }
    }

    private function add(float $a, float $b): float
    {
        return $a + $b;
    }

    private function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    private function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    private function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new DivisionByZeroError('Division by zero.');
        }
        return $a / $b;
    }

    private function sqrt(float $a): float
    {
        if ($a < 0) {
            throw new InvalidArgumentException('Cannot compute square root of a negative number.');
        }
        return sqrt($a);
    }
}
