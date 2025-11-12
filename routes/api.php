<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/classes', [App\Http\Controllers\ClassController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/scores', [ScoreController::class, 'index']); // xem điểm
    Route::post('/scores/update/{id}', [ScoreController::class, 'update']); // cập nhật điểm
});