<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignedImageUploadController;

Route::get('/signed/upload', [SignedImageUploadController::class, 'showForm'])->name('signed.form');
Route::post('/signed/upload-url', [SignedImageUploadController::class, 'generateSignedUpload'])->name('signed.upload.url');
Route::get('/signed/result', [SignedImageUploadController::class, 'showResult'])->name('signed.result');

Route::get('/', function () {
    return view('welcome');
});
