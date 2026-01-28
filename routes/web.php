<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

/* HOME */
Route::get('/', function () {
    return view('welcome');
});

/* LOGIN */
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

/* USER DASHBOARD */
Route::middleware(['auth', 'role:pegawai']) ->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/pengajuan', function () {
        return view('user.pengajuan');
    })->name('user.pengajuan');

    Route::get('/user/panduan', function () {
        return view('user.panduan');
    })->name('user.panduan');
});

/* ADMIN DASHBOARD */
Route::middleware(['auth', 'role:verifikator,reviewer'])
    ->get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })
    ->name('admin.dashboard');

Route::get('/redirect', function () {
    $user = Auth::user();
    $role = $user->role;

    if ($role === 'pegawai') {
        return redirect()->route('user.dashboard');
    }

    if (in_array($role, ['verifikator', 'reviewer'])) {
        return redirect()->route('admin.dashboard');
    }

    abort(403);
})->middleware('auth')->name('redirect');

    /* LOGOUT */
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
