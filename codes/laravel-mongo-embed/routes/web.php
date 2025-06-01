<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
