<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;

/* HOME */
Route::get('/', function () {
    return view('auth.login');
});

/* LOGIN */
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

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

        Route::prefix('pengajuan')->name('pengajuan.')->group(function () {
            Route::get('/', [PengajuanController::class, 'index'])
                ->name('index');    
            Route::get('/paten', [PengajuanController::class, 'createPaten'])
                ->name('paten');
            Route::get('/hak-cipta', [PengajuanController::class, 'createHakCipta'])
                ->name('hak-cipta');
            Route::get('/pvt', [PengajuanController::class, 'createPVT'])
                ->name('pvt');
            Route::get('/merek', [PengajuanController::class, 'createMerek'])
                ->name('merek');
            Route::get('/desain-industri', [PengajuanController::class, 'createDesainIndustri'])
                ->name('desain-industri');
            Route::get('/desain-tlst', [PengajuanController::class, 'createDesainTLST'])
                ->name('desain-tlst');
            Route::get('/indikasi-geografis', [PengajuanController::class, 'createIndikasiGeografis'])
                ->name('indikasi-geografis');
            Route::post('/', [PengajuanController::class, 'store'])
                ->name('store');
    });
});

/* Route Submit Form */
Route::post('/pengajuan', function () {
    // Logic untuk menyimpan data
    return redirect()->route('dashboard')->with('success', 'Pengajuan berhasil disimpan!');
})->middleware('auth')->name('pengajuan.store');

    /* LOGOUT */
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
