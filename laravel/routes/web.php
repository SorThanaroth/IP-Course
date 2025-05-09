<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;


Route::get('/', function () {
    return view('upload_file');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/upload_file', function () {
    return view('upload_file');
});
Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::get('/test', [UploadController::class, 'test'])->name('test');

require __DIR__.'/auth.php';
