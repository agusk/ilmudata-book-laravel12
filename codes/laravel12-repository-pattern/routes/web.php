<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('books.index');

// Route::get('/', function () {
//     return view('welcome');
// });
