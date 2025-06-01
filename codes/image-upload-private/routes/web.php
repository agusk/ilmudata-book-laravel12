<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrivateImageUploadController;

Route::get('/private/upload', [PrivateImageUploadController::class, 'showForm'])->name('private.form');
Route::post('/private/upload', [PrivateImageUploadController::class, 'handleUpload'])->name('private.handle');
Route::get('/private/result', [PrivateImageUploadController::class, 'showResult'])->name('private.result');
Route::get('/private/image/{filename}', [PrivateImageUploadController::class, 'viewImage'])->name('private.image');

Route::get('/', function () {
    return view('welcome');
});
