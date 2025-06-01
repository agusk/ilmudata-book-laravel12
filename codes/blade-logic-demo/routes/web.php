<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogicController;

Route::get('/logic', [LogicController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
