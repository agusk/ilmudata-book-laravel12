<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/all', function () {
        return view('all');
    });

    Route::get('/admin', function () {
        return view('admin');
    })->middleware('role:admin');

    Route::get('/manager', function () {
        return view('manager');
    })->middleware('role:manager');

    Route::get('/user', function () {
        return view('user');
    })->middleware('role:user');
});

require __DIR__.'/auth.php';
