<?php

use App\Http\Controllers\AdminGroupController;
use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\AdminTermController;
use App\Http\Controllers\AdminAssignController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/terms', [AdminTermController::class, 'index'])->name('admin.terms');
    Route::post('/admin/terms', [AdminTermController::class, 'store'])->name('admin.terms.store');

    Route::get('/admin/subjects', [AdminSubjectController::class, 'index'])->name('admin.subjects');
    Route::post('/admin/subjects', [AdminSubjectController::class, 'store'])->name('admin.subjects.store');

    Route::get('/admin/groups', [AdminGroupController::class, 'index'])->name('admin.groups');
    Route::post('/admin/groups/add-student', [AdminGroupController::class, 'addStudent'])->name('admin.groups.addStudent');

    Route::get('/admin/assign', [AdminAssignController::class, 'index'])->name('admin.assign');
    Route::post('/admin/assign', [AdminAssignController::class, 'store']);



});


