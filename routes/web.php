<?php

use App\Http\Controllers\Auth\RegisteredUserController; // Sửa tên controller ở đây
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route đăng nhập
Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);

// Route đăng xuất
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route đăng ký
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);