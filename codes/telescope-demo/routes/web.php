<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/hello', function () {
    Log::info('Visited /hello route');
    return 'Hello from Laravel Telescope!';
});

Route::get('/', function () {
    return view('welcome');
});

