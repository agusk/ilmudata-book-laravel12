<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\FriendController;

Route::get('/greet/guest', [GuestController::class, 'greet']);
Route::get('/greet/friend', [FriendController::class, 'greet']);

Route::get('/', function () {
    return view('welcome');
});
