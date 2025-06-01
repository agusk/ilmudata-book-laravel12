<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/home', [PageController::class, 'home']);
Route::get('/contact', [PageController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
