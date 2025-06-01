<?php

namespace App\Services;

use App\DTOs\CalculatorDTO;

class CalculatorService
{
    public function calculate(CalculatorDTO $dto): float
    {
        switch ($dto->operation) {
            case 'add':
                return $dto->num1 + $dto->num2;
            case 'subtract':
                return $dto->num1 - $dto->num2;
            case 'multiply':
                return $dto->num1 * $dto->num2;
            case 'divide':
                if ($dto->num2 == 0) {
                    throw new \Exception("Cannot divide by zero");
                }
                return $dto->num1 / $dto->num2;
            default:
                throw new \Exception("Invalid operation");
        }
    }
}