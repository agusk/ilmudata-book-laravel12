<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

Route::get('/upload', [ImageUploadController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [ImageUploadController::class, 'handleUpload'])->name('upload.handle');
Route::get('/result', [ImageUploadController::class, 'showResult'])->name('upload.result');

Route::get('/', function () {
    return view('welcome');
});
