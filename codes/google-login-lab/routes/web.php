<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return Auth::user();
    });
});

Route::get('/logout', [GoogleAuthController::class, 'logout'])->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});
