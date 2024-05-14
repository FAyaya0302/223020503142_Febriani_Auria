<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use \App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/search', [PostController::class, 'search'])->name('postsSearch'); // search post


Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');


Route::post('/post/toggleStatus', [PostController::class, 'toggleStatus'])->name('toggleStatus'); // toggle status


Route::get('/post/updateStatusInIndex', [PostController::class, 'updateStatusInIndex'])->name('updateStatusInIndex'); // update status toggel in index


Route::resource('/posts', PostController::class);


Route::get('/admins/index', [AdminController::class, 'index'])->name('admins.index');


Route::resource('/admins', AdminController::class);


Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard.index');


Route::resource('/dashboard', DasboardController::class);


Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('postsLogin');


Route::resource('/register', AuthController::class);


Route::get('/register', [AuthController::class, 'create'])->name('register.index');
