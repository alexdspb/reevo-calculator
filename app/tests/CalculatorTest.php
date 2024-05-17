<?php

namespace tests;

use Calculator;
use DivisionByZeroError;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Calculator.php';

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $this->assertEquals(7, $this->calculator->calculate('5 + 2'));
    }

    public function testSubtract()
    {
        $this->assertEquals(3, $this->calculator->calculate('5 - 2'));
    }

    public function testMultiply()
    {
        $this->assertEquals(10, $this->calculator->calculate('5 * 2'));
    }

    public function testDivide()
    {
        $this->assertEquals(2.5, $this->calculator->calculate('5 / 2'));
    }

    public function testDivideByZero()
    {
        $this->expectException(DivisionByZeroError::class);
        $this->calculator->calculate('5 / 0');
    }

    public function testSquareRoot()
    {
        $this->assertEquals(3, $this->calculator->calculate('9 sqrt'));
    }

    public function testNegativeSquareRoot()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate('-9 sqrt');
    }

    public function testInvalidInput()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate('invalid input');
    }
}
