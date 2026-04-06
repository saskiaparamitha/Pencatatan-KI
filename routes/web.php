<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PegawaiController;
//use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landing-page');
})->name('landing');

//Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
//Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::get('/tentang-web', function () {
    return view('tentang-web');
})->name('tentang-web');

/* HOME */
// Route::get('/', function () {
//     return view('auth.login');
// });

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

/* ADMIN VERIFIKATOR */
Route::middleware(['auth', 'role:verifikator'])
    ->get('/admin/verifikator', function () {
        return view('admin.verifikator');
    })
    ->name('admin.verifikator');

/* ADMIN REVIEWER */
Route::middleware(['auth', 'role:reviewer'])
    ->get('/admin/reviewer', function () {
        return view('admin.reviewer');
    })
    ->name('admin.reviewer');

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
    Route::get('/user/dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard');

    Route::get('/user/pengajuan', function () {
        return view('user.pengajuan');
    })->name('user.pengajuan');

    Route::get('/user/panduan', function () {
        return view('user.panduan');
    })->name('user.panduan');

    Route::get('/pegawai/search', [PengajuanController::class, 'searchPegawai']);

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
        Route::get('/{id}', [PengajuanController::class, 'show'])
            ->name('show');
        Route::get('/riwayat', [PengajuanController::class, 'riwayat'])
            ->name('riwayat');
        Route::post('/', [PengajuanController::class, 'storeDataForm'])
            ->name('storeDataForm');
        Route::post('/save-draft', [PengajuanController::class, 'saveDraft'])
            ->name('save-draft');
        Route::delete('/dokumen/{id}', [PengajuanController::class, 'deleteDokumen'])
            ->name('deleteDokumen');
        Route::get('/dokumen', function () {
            return view('user.dokumen');
        })->name('dokumen');

    // halaman dokumen (step selanjutnya)
    Route::get('/pengajuan/dokumen', function () {
        return view('user.dokumen');
    })->name('pengajuan.dokumen');

    // Search pegawai untuk kolaborator
    Route::get('/pegawai/search', [PegawaiController::class, 'search'])
        ->name('pegawai.search');
    });
});

Route::post('/pengajuan/save-draft', 
        [PengajuanController::class, 'storeDataForm']
    )->name('pengajuan.save-draft');

    /* LOGOUT */
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
