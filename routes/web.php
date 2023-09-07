<?php

use App\Http\Controllers\AdminPanel\AuthController as AdminPanelAuthController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminPanel\BlogController;
use App\Http\Controllers\UserPanel\AuthController as UserPanelAuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('blog')->name('blog.')->group(function () {



// Route::prefix('admin-panel')->name('admin-panel.')->group(function () {
//     Route::prefix('users')->name('users.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::post('/store', [UserController::class, 'store'])->name('store');
//         Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
//         Route::put('/{user}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
//     });
// });

// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('user-panel')->name('user-panel.')->group(function () {
    Route::get('/', [UserPanelAuthController::class, 'showLoginForm'])->name('login.form');
    Route::get('/register', [UserPanelAuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserPanelAuthController::class, 'showRegisterForm'])->name('register');

    // Route::group(['middleware' => ['role:user']], function () {
    //     Route::get('/', [AdminPanelAuthController::class, 'showLoginForm'])->name('login.form');
    // });
});

Route::prefix('admin-panel')->name('admin-panel.')->group(function () {
    Route::get('/', [AdminPanelAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminPanelAuthController::class, 'login'])->name('login');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/admin/logout', [AdminPanelAuthController::class, 'logout'])->name('logout');

        Route::prefix('blogs')->name('blogs.')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/create', [BlogController::class, 'create'])->name('create');
            Route::post('/store', [BlogController::class, 'store'])->name('store');
            Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
            Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
            Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::group(['middleware' => ['role:editor']], function () {
});

Route::group(['middleware' => ['role:user']], function () {
});
