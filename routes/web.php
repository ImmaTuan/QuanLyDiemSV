<?php

use App\Http\Controllers\AdminGroupController;
use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\AdminTermController;
use App\Http\Controllers\AdminAssignController;
use App\Http\Controllers\UserProfileController;
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
Route::get('/profile', [UserProfileController::class, 'show'])->name('show');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/terms', [AdminTermController::class, 'index'])->name('admin.terms');
    Route::post('/admin/terms', [AdminTermController::class, 'store'])->name('admin.terms.store');

    Route::get('/admin/subjects', [AdminSubjectController::class, 'index'])->name('admin.subjects');
    Route::post('/admin/subjects/store', [AdminSubjectController::class, 'store'])->name('admin.subjects.store');
    Route::put('/admin/subjects/{id}/update', [AdminSubjectController::class, 'update'])->name('admin.subjects.update');
    Route::delete('/admin/subjects/{id}/delete', [AdminSubjectController::class, 'delete'])->name('admin.subjects.delete');

    Route::get('/admin/groups', [AdminGroupController::class, 'index'])->name('admin.groups');
    Route::post('/admin/groups/add-student', [AdminGroupController::class, 'addStudent'])->name('admin.groups.addStudent');
    Route::post('/admin/groups/import-file', [AdminGroupController::class, 'import'])->name('admin.groups.import');
    Route::delete('/admin/groups/delete/{id}', [AdminGroupController::class, 'delete'])->name('admin.groups.delete');
    Route::put('/admin/groups/{id}/update', [AdminGroupController::class, 'update'])->name('admin.groups.update');

    Route::get('/admin/assign', [AdminAssignController::class, 'index'])->name('admin.assign');
    Route::post('/admin/assign/store', [AdminAssignController::class, 'store'])->name('admin.assign.store');
    Route::get('/admin/assign/{id}/edit', [AdminAssignController::class, 'edit'])->name('admin.assign.edit');
    Route::put('/admin/assign/{id}/update', [AdminAssignController::class, 'update'])->name('admin.assign.update');
    Route::delete('/admin/assign/{id}/delete', [AdminAssignController::class, 'delete'])->name('admin.assign.delete');



});


