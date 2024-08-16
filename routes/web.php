<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('/auth')->middleware(['guest'])->group(function () {
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');
    Route::post('/sign-up', [AuthController::class, 'registerSubmit'])->name('register.submit');
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::post('/sign-in', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgotSubmit'])->name('forgot.submit');
    Route::get('/forgot-password/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/forgot-password/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('/announcement')->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcement');
    Route::post('/', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::post('/{id}/update', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::get('/{id}/destroy', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
});