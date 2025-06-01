<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'getMessage']);
Route::post('/hello', [HelloController::class, 'postMessage']);
Route::put('/hello', [HelloController::class, 'putMessage']);
Route::delete('/hello', [HelloController::class, 'deleteMessage']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
