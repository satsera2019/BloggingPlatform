<?php

use App\Http\Controllers\AdminPanel\AuthController as AdminPanelAuthController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index')->middleware('permission:view post');
        Route::get('/create', [BlogController::class, 'create'])->name('create')->middleware('permission:publish post');
        Route::post('/store', [BlogController::class, 'store'])->name('store')->middleware('permission:publish post');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit')->middleware('permission:edit post');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('update')->middleware('permission:edit post');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy')->middleware('permission:delete post');

        Route::get('/show/{blog}', [BlogController::class, 'showBlog'])->name('show')->middleware('permission:view post');
    });

    Route::prefix('comment')->name('comment.')->group(function () {
        Route::post('/{blog}', [CommentController::class, 'addComment'])->name('add')->middleware('permission:comment post');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('destroy')->middleware('permission:delete comment');
    });
});
