<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operator' => 'required|in:add,sub,mul,div'
        ]);

        $result = match ($validated['operator']) {
            'add' => $validated['number1'] + $validated['number2'],
            'sub' => $validated['number1'] - $validated['number2'],
            'mul' => $validated['number1'] * $validated['number2'],
            'div' => $validated['number2'] != 0 ? $validated['number1'] / $validated['number2'] : 'Error: Division by zero'
        };

        return view('calculator', [
            'result' => $result,
            'number1' => $validated['number1'],
            'number2' => $validated['number2'],
            'operator' => $validated['operator']
        ]);
    }

}
