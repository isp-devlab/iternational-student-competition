<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'hasTeam']);

Route::get('/competition/registration', [CompetitionController::class, 'registration'])->name('competition.registration')->middleware(['auth']);
Route::prefix('/competition')->middleware(['auth', 'hasTeam'])->group(function () {
    Route::get('/member', [CompetitionController::class, 'member'])->name('competition.member');
});

Route::prefix('/user')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('/assessment')->middleware(['auth'])->group(function () {
    Route::prefix('/qualification')->group(function () {
        Route::get('/', [AssessmentController::class, 'qualification'])->name('assessment.qualification');
        Route::post('/', [AssessmentController::class, 'qualificationStore'])->name('assessment.qualification.store');
    });
    Route::prefix('/final')->group(function () {
        Route::get('/', [AssessmentController::class, 'final'])->name('assessment.final');
        Route::post('/', [AssessmentController::class, 'finalStore'])->name('assessment.final.store');
    });
    Route::post('/{id}/update', [AssessmentController::class, 'update'])->name('assessment.update');
    Route::get('/{id}/destroy', [AssessmentController::class, 'destroy'])->name('assessment.destroy');
});

Route::prefix('/announcement')->middleware(['auth'])->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcement');
    Route::post('/', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::post('/{id}/update', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::get('/{id}/destroy', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
});

Route::prefix('/setting')->middleware(['auth'])->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('setting');
    Route::post('/', [SettingController::class, 'update'])->name('setting.update');
});

Route::prefix('/team')->middleware(['auth'])->group(function () {
    Route::get('/', [TeamController::class, 'index'])->name('team');
    Route::post('/', [TeamController::class, 'update'])->name('team.update');
});