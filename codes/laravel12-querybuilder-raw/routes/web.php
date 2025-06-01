<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeReportController;

Route::get('/', [EmployeeReportController::class, 'index'])->name('employees.report');

// Route::get('/', function () {
//     return view('welcome');
// });
