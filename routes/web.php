<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login')


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
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
