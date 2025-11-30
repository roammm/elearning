<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page (accessible to all, but shows different content based on auth status)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Additional authenticated routes
    Route::get('/elearning', [HomeController::class, 'elearning'])->name('elearning');
    Route::get('/leaderboard', [HomeController::class, 'leaderboard'])->name('leaderboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/courses/{slug}', [HomeController::class, 'course'])->name('course.show');
    Route::post('/courses/{slug}/quiz', [HomeController::class, 'submitQuiz'])->name('course.quiz.submit');
    Route::get('/courses/{slug}/chapters/{index}', [HomeController::class, 'chapter'])->name('course.chapter');
    Route::get('/courses/{slug}/chapters/{chapterIndex}/parts/{partIndex}', [HomeController::class, 'chapterPart'])->name('course.chapter.part');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// Google OAuth routes
Route::get('/auth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback'])->name('google.callback');
