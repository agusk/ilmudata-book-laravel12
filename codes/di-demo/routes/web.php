<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/message', [MessageController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
