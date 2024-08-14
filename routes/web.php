<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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