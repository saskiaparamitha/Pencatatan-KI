<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VerifikatorController;
use App\Http\Controllers\Admin\ReviewerController;

/* HOME */
Route::get('/', function () {
    return view('auth.login');
});

/* LOGIN */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

/* USER DASHBOARD */
Route::middleware(['auth','role:pegawai'])
->get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

/* ===== ADMIN DASHBOARD ===== */
Route::middleware(['auth','role:verifikator,reviewer'])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

});

/* ===============================
   VERIFIKATOR
================================ */
Route::middleware(['auth','role:verifikator'])
->prefix('verifikator')
->name('verifikator.')
->group(function () {

    /* PATEN */
    Route::get('/paten',[VerifikatorController::class,'paten'])->name('paten');
    Route::get('/paten/{id}/detail',[VerifikatorController::class,'detailPaten'])->name('paten.detail');

    Route::post('/verifikasi/{id}',[VerifikatorController::class,'verifikasiPengajuan'])->name('verifikasi');
    Route::post('/tolak/{id}',[VerifikatorController::class,'tolakPengajuan'])->name('tolak');

    Route::get('/dokumen/{id}/download',[VerifikatorController::class,'downloadDokumen'])->name('dokumen.download');

    /* HAK CIPTA */
    Route::get('/hak-cipta',[VerifikatorController::class,'hakCipta'])->name('hak-cipta');
    Route::get('/hak-cipta/{id}/detail',[VerifikatorController::class,'detailHakCipta']);

    /* MEREK */
    Route::get('/merek',[VerifikatorController::class,'merek'])->name('merek');
    Route::get('/merek/{id}/detail',[VerifikatorController::class,'detailMerek']);

    Route::post('/merek/verifikasi/{id}',[VerifikatorController::class,'verifikasiMerek'])->name('merek.verifikasi');
    Route::post('/merek/tolak/{id}',[VerifikatorController::class,'tolakMerek'])->name('merek.tolak');

    /* DESAIN INDUSTRI */
    Route::get('/desain-industri',[VerifikatorController::class,'desainIndustri'])->name('desain-industri');
    Route::get('/desain-industri/{id}/detail',[VerifikatorController::class,'detailDesainIndustri']);

    Route::post('/desain-industri/verifikasi/{id}',[VerifikatorController::class,'verifikasiDesainIndustri'])->name('desain-industri.verifikasi');
    Route::post('/desain-industri/tolak/{id}',[VerifikatorController::class,'tolakDesainIndustri'])->name('desain-industri.tolak');

    /* VARIETAS TANAMAN */
    Route::get('/varietas-tanaman',[VerifikatorController::class,'varietasTanaman'])->name('varietas-tanaman');

    /* DESAIN SIRKUIT */
    Route::get('/desain-sirkuit',[VerifikatorController::class,'desainSirkuit'])->name('desain-sirkuit');

    /* INDIKASI GEOGRAFIS */
    Route::get('/indikasi-geografis',[VerifikatorController::class,'indikasiGeografis'])->name('indikasi-geografis');

});


/* ===============================
   REVIEWER
================================ */
Route::middleware(['auth','role:reviewer'])
->prefix('reviewer')
->name('reviewer.')
->group(function () {

    /* PATEN */
    Route::get('/paten',[ReviewerController::class,'paten'])->name('paten');
    Route::get('/paten/{id}/detail',[ReviewerController::class,'detailPaten'])->name('paten.detail');

    /* HAK CIPTA */
    Route::get('/hak-cipta',[ReviewerController::class,'hakCipta'])->name('hak-cipta');
    Route::get('/hak-cipta/{id}/detail',[ReviewerController::class,'detailHakCipta'])->name('hak-cipta.detail');

    /* MEREK */
    Route::get('/merek',[ReviewerController::class,'merek'])->name('merek');
    Route::get('/merek/{id}/detail',[ReviewerController::class,'detailMerek'])->name('merek.detail');

    /* DESAIN INDUSTRI */
    Route::get('/desain-industri',[ReviewerController::class,'desainIndustri'])->name('desain-industri');
    Route::get('/desain-industri/{id}/detail',[ReviewerController::class,'detailDesainIndustri'])->name('desain-industri.detail');

    /* VARIETAS TANAMAN */
    Route::get('/varietas-tanaman',[ReviewerController::class,'varietasTanaman'])->name('varietas-tanaman');
    Route::get('/varietas-tanaman/{id}/detail',[ReviewerController::class,'detailVarietasTanaman'])->name('varietas-tanaman.detail');

    /* DESAIN SIRKUIT */
    Route::get('/desain-sirkuit',[ReviewerController::class,'desainSirkuit'])->name('desain-sirkuit');
    Route::get('/desain-sirkuit/{id}/detail',[ReviewerController::class,'detailDesainSirkuit'])->name('desain-sirkuit.detail');

    /* INDIKASI GEOGRAFIS */
    Route::get('/indikasi-geografis',[ReviewerController::class,'indikasiGeografis'])->name('indikasi-geografis');
    Route::get('/indikasi-geografis/{id}/detail',[ReviewerController::class,'detailIndikasiGeografis'])->name('indikasi-geografis.detail');

    /* ACTION REVIEW */
    Route::post('/approve/{id}',[ReviewerController::class,'approvePengajuan'])->name('approve');
    Route::post('/reject/{id}',[ReviewerController::class,'rejectPengajuan'])->name('reject');
    Route::post('/comment/{id}',[ReviewerController::class,'addComment'])->name('comment');

});


/* REDIRECT */
Route::get('/redirect',function () {

    $user = Auth::user();

    if ($user->role === 'pegawai') {
        return redirect()->route('user.dashboard');
    }

    if (in_array($user->role,['verifikator','reviewer'])) {
        return redirect()->route('admin.dashboard');
    }

    abort(403);

})->middleware('auth')->name('redirect');


/* LOGOUT */
Route::post('/logout',[AuthController::class,'logout'])->name('logout');