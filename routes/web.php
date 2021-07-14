<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::prefix('/auth')->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/', [AuthController::class, 'validateLogin'])->name('auth.login.validate');
    });

    Route::prefix('/registration')->group(function () {
        Route::get('/', [AuthController::class, 'registration'])->name('auth.registration');
        Route::post('/', [AuthController::class, 'createAccount'])->name('auth.registration.create');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::prefix('/courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('course.index');
        Route::get('/new', [CourseController::class, 'create'])->name('course.create');
        Route::post('/store', [CourseController::class, 'store'])->name('course.store');
        Route::get('/id/{course}', [CourseController::class, 'edit'])->name('course.edit');
        Route::post('/id/{course}', [CourseController::class, 'update'])->name('course.update');
        Route::get('/id/{course}/delete', [CourseController::class, 'delete'])->name('course.delete');
        Route::get('/id/{course}/detail', [CourseController::class, 'show'])->name('course.show');
    });
});
