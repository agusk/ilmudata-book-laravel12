<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/home', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);

Route::get('/', function () {
    return view('welcome');
});
