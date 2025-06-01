<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculatorController;

Route::post('/calculate', [CalculatorController::class, 'calculate']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
