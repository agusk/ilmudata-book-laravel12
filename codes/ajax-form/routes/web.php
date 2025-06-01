<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxFormController;

Route::get('/ajax-form', [AjaxFormController::class, 'showForm'])->name('ajax.form');
Route::post('/ajax-submit', [AjaxFormController::class, 'submitForm'])->name('ajax.submit');

Route::get('/', function () {
    return view('welcome');
});
