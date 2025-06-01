<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;

Route::get('/home', [ThemeController::class, 'home']);
Route::get('/switch-theme/{theme}', [ThemeController::class, 'switchTheme'])->name('switch-theme');

Route::get('/', function () {
    return view('welcome');
});
