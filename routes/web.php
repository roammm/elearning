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
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [HomeController::class, 'updatePassword'])->name('profile.update-password');
    Route::delete('/profile', [HomeController::class, 'destroyAccount'])->name('profile.destroy');
    Route::get('/courses/{slug}', [HomeController::class, 'course'])->name('course.show');
    Route::get('/courses/{slug}/quiz', [HomeController::class, 'showQuiz'])->name('course.quiz.show');
    Route::post('/courses/{slug}/quiz', [HomeController::class, 'submitQuiz'])->name('course.quiz.submit');
    Route::get('/courses/{slug}/chapters/{index}', [HomeController::class, 'chapter'])->name('course.chapter');
    Route::get('/courses/{slug}/chapters/{chapterIndex}/parts/{partIndex}', [HomeController::class, 'chapterPart'])->name('course.chapter.part');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Register member (ADMIN only)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
});

// Google OAuth routes
Route::get('/auth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');

    // Courses
    Route::get('/courses', [App\Http\Controllers\AdminController::class, 'courses'])->name('courses');
    Route::get('/courses/create', [App\Http\Controllers\AdminController::class, 'createCourse'])->name('courses.create');
    Route::post('/courses', [App\Http\Controllers\AdminController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/{course}/edit', [App\Http\Controllers\AdminController::class, 'editCourse'])->name('courses.edit');
    Route::put('/courses/{course}', [App\Http\Controllers\AdminController::class, 'updateCourse'])->name('courses.update');
    Route::delete('/courses/{course}', [App\Http\Controllers\AdminController::class, 'destroyCourse'])->name('courses.destroy');

    // Chapters
    Route::get('/courses/{course}/chapters', [App\Http\Controllers\AdminController::class, 'chapters'])->name('chapters');
    Route::get('/courses/{course}/chapters/create', [App\Http\Controllers\AdminController::class, 'createChapter'])->name('chapters.create');
    Route::post('/courses/{course}/chapters', [App\Http\Controllers\AdminController::class, 'storeChapter'])->name('chapters.store');
    Route::get('/chapters/{chapter}/edit', [App\Http\Controllers\AdminController::class, 'editChapter'])->name('chapters.edit');
    Route::put('/chapters/{chapter}', [App\Http\Controllers\AdminController::class, 'updateChapter'])->name('chapters.update');
    Route::delete('/chapters/{chapter}', [App\Http\Controllers\AdminController::class, 'destroyChapter'])->name('chapters.destroy');

    // Parts
    Route::get('/chapters/{chapter}/parts', [App\Http\Controllers\AdminController::class, 'parts'])->name('parts');
    Route::get('/chapters/{chapter}/parts/create', [App\Http\Controllers\AdminController::class, 'createPart'])->name('parts.create');
    Route::post('/chapters/{chapter}/parts', [App\Http\Controllers\AdminController::class, 'storePart'])->name('parts.store');
    Route::get('/parts/{part}/edit', [App\Http\Controllers\AdminController::class, 'editPart'])->name('parts.edit');
    Route::put('/parts/{part}', [App\Http\Controllers\AdminController::class, 'updatePart'])->name('parts.update');
    Route::delete('/parts/{part}', [App\Http\Controllers\AdminController::class, 'destroyPart'])->name('parts.destroy');

    // Quizzes
    Route::get('/courses/{course}/quizzes', [App\Http\Controllers\AdminController::class, 'quizzes'])->name('quizzes');
    Route::get('/courses/{course}/quizzes/{quizName}', [App\Http\Controllers\AdminController::class, 'quizQuestions'])->name('quizzes.questions');
    Route::get('/courses/{course}/quizzes/create', [App\Http\Controllers\AdminController::class, 'createQuiz'])->name('quizzes.create');
    Route::post('/courses/{course}/quizzes', [App\Http\Controllers\AdminController::class, 'storeQuiz'])->name('quizzes.store');
    Route::get('/quizzes/{quiz}/edit', [App\Http\Controllers\AdminController::class, 'editQuiz'])->name('quizzes.edit');
    Route::put('/quizzes/{quiz}', [App\Http\Controllers\AdminController::class, 'updateQuiz'])->name('quizzes.update');
    Route::delete('/quizzes/{quiz}', [App\Http\Controllers\AdminController::class, 'destroyQuiz'])->name('quizzes.destroy');

    // Roles
    Route::post('/roles', [App\Http\Controllers\AdminController::class, 'storeRole'])->name('roles.store');
    Route::delete('/roles/{role}', [App\Http\Controllers\AdminController::class, 'destroyRole'])->name('roles.destroy');

    // Users
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::put('/users/{user}/role', [App\Http\Controllers\AdminController::class, 'updateUserRole'])->name('users.update-role');
    Route::put('/users/{user}/roles', [App\Http\Controllers\AdminController::class, 'updateUserRoles'])->name('users.update-roles');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
});
