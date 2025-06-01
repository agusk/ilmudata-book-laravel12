<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinioImageUploadController;

Route::get('/upload', [MinioImageUploadController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [MinioImageUploadController::class, 'handleUpload'])->name('upload.handle');
Route::get('/result', [MinioImageUploadController::class, 'showResult'])->name('upload.result');

Route::get('/', function () {
    return view('welcome');
});
