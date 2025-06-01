<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTOs\CalculatorDTO;
use App\Services\CalculatorService;
use Illuminate\Http\JsonResponse;

class CalculatorController extends Controller
{
    private $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function calculate(Request $request): JsonResponse
    {
        // Validate request
        $validated = $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operation' => 'required|string|in:add,subtract,multiply,divide',
        ]);

        try {
            // Create DTO instance
            $dto = new CalculatorDTO($validated['num1'], $validated['num2'], $validated['operation']);
            
            // Process calculation
            $result = $this->calculatorService->calculate($dto);

            return response()->json([
                'success' => true,
                'num1' => $dto->num1,
                'num2' => $dto->num2,
                'operation' => $dto->operation,
                'result' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
