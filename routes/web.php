<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/panel', [AuthController::class, 'panel'])->middleware('auth')->name('panel');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('/scores/edit/{id}', [ScoreController::class, 'edit'])->name('scores.edit');
    Route::post('/scores/update/{id}', [ScoreController::class, 'update'])->name('scores.update');
    
});