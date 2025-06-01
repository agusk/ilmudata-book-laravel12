<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/store', [CarController::class, 'store'])->name('cars.store');
Route::get('/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
Route::post('/update/{id}', [CarController::class, 'update'])->name('cars.update');
Route::get('/delete/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

// Route::get('/', function () {
//     return view('welcome');
// });
