<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/notify', [NotificationController::class, 'notify']);

Route::get('/', function () {
    return view('welcome');
});
