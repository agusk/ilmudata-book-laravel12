<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'showForm'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'handleForm'])->name('profile.handle');

Route::get('/', function () {
    return view('welcome');
});
