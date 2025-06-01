<?php

namespace App\DTOs;

class CalculatorDTO
{
    public float $num1;
    public float $num2;
    public string $operation;

    public function __construct(float $num1, float $num2, string $operation)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operation = $operation;
    }
}