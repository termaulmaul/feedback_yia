<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

// Rute utama, arahkan ke halaman utama
Route::get('/', [FeedbackController::class, 'index'])->name('home');

// Rute untuk halaman feedback dalam bahasa Indonesia
Route::get('/feedback/id', [FeedbackController::class, 'showFeedbackID'])->name('feedback.id');

// Rute untuk halaman feedback dalam bahasa Inggris
Route::get('/feedback/en', [FeedbackController::class, 'showFeedbackEN'])->name('feedback.en');

// Rute untuk mengirim feedback
Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->name('submit-feedback');

// Rute untuk halaman admin dengan prefix 'admin'
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/questions', [AdminController::class, 'questions'])->name('admin.questions');
    Route::get('/responses', [AdminController::class, 'responses'])->name('admin.responses');
    Route::get('/response-detail/{id}', [AdminController::class, 'detailResponse'])->name('admin.response-detail');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Rute login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

