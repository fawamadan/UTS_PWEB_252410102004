<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Login
Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'processLogin'])->name('login.process');

// Halaman utama
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/video/{id}', [PageController::class, 'detail'])->name('video.detail');
Route::get('/watch/{videoId}/{episodeId}', [PageController::class, 'watch'])->name('video.watch');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

// Aksi bookmark & like
Route::post('/bookmark/{id}', [PageController::class, 'toggleBookmark'])->name('video.bookmark');
Route::post('/like/{id}', [PageController::class, 'toggleLike'])->name('video.like');