<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/{user_slug}/home', [UserController::class, 'home'])
        ->name('user_home');

    Route::controller(PostController::class)
        ->prefix('/post')
        ->group(function() {
            Route::get('/create', 'create')->name('post.create');
            Route::post('/', 'store')->name('post.store');
            Route::get('/{post}/edit', 'edit')->name('post.edit');
            Route::post('/{post}', 'update')->name('post.update');
            Route::get('/{post}/destroy', 'destroy')->name('post.destroy');
        });
});

Route::get('/{user_slug}/{post}', [HomeController::class, 'post'])->name('user_post');
