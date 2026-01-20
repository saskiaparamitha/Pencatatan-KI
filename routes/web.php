<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:verifikator'])->group(function () {
        Route::get('/admin/verifikator', function () {
            return view('admin.verifikator');
        });
    });

    Route::middleware(['role:reviewer'])->group(function () {
        Route::get('/admin/reviewer', function () {
            return view('admin.reviewer');
        });
    });
});
