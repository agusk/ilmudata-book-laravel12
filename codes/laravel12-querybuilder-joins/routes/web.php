<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', [ReportController::class, 'index'])->name('reports.index');

// Route::get('/', function () {
//     return view('welcome');
// });
