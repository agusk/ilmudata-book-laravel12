<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiStepFormController;

Route::get('/form/step1', [MultiStepFormController::class, 'step1'])->name('form.step1');
Route::post('/form/step1', [MultiStepFormController::class, 'storeStep1']);

Route::get('/form/step2', [MultiStepFormController::class, 'step2'])->name('form.step2');
Route::post('/form/step2', [MultiStepFormController::class, 'storeStep2']);

Route::get('/form/summary', [MultiStepFormController::class, 'summary'])->name('form.summary');

Route::get('/', function () {
    return view('welcome');
});
