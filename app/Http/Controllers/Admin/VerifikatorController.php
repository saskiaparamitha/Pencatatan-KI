<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TrxUsulanKi;
use App\Models\TrxVerifikasi;
use Carbon\Carbon;
use App\Models\TrxDokumenKi;
use Illuminate\Support\Facades\Storage;


class VerifikatorController extends Controller
{
    /**
     * Halaman Verifikasi Paten
     */
    public function paten()
    {
        $paten = TrxUsulanKi::with(['verifikasi.user', 'mstKi', 'user'])
            ->where('mst_ki_id', 1) // PATEN
            ->latest()
            ->get();

        $reviewers = User::where('role', 'reviewer')->get();

        return view('admin.verifikator.paten', [
            'data'          => $paten,
            'reviewers'     => $reviewers,
            'total'         => $paten->count(),
            'menunggu'      => $paten->where('verifikasi.titik_proses', 2)->count(),
            'terverifikasi' => $paten->where('verifikasi.titik_proses', 3)->count(),
            'ditolak'       => $paten->where('verifikasi.titik_proses', 4)->count(),
        ]);
    }

    /**
     * Verifikasi Pengajuan (Assign Reviewer)
     */
    public function verifikasiPengajuan(Request $request, $id)
{
    try {
        $request->validate([
            'reviewer_id' => 'required|exists:users,user_id',
        ]);

        TrxVerifikasi::updateOrCreate(
            ['trx_usulan_ki_id' => $id],
            [
                'titik_proses'  => 3, // TERVERIFIKASI
                'mst_status_id' => 3,
                'user_id'       => $request->reviewer_id,
            ]
        );

        return response()->json([
            'success' => true
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}


    /**
     * Tolak Pengajuan
     */
    public function tolakPengajuan(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string|min:5',
        ]);

        DB::transaction(function () use ($id, $request) {
            TrxVerifikasi::updateOrCreate(
                ['trx_usulan_ki_id' => $id],
                [
                    'titik_proses' => 4, // DITOLAK
                    'catatan'      => $request->alasan,
                    'user_id'      => Auth::id(),
                ]
            );
        });

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan berhasil ditolak'
        ]);
    }

    /**
     * Detail Pengajuan (AJAX)
     */
public function detailPaten($id)
{
    $usulan = TrxUsulanKi::with([
        'user',
        'verifikasi',
        'dokumen',
        'kolaborator'
    ])->findOrFail($id);

    return response()->json([
        'judul'       => $usulan->judul,
        'pemohon'     => $usulan->user->username ?? '-',
        'email'       => $usulan->user->email ?? '-',
        'tanggal'     => $usulan->tanggal
                            ? Carbon::parse($usulan->tanggal)->translatedFormat('d F Y')
                            : '-',
        'deskripsi'   => $usulan->deskripsi ?? '-',
        'status'      => optional($usulan->verifikasi)->titik_proses,
        'dokumen'     => $usulan->dokumen ?? [],
        'kolaborator' => $usulan->kolaborator ?? [],
    ]);
}

public function downloadDokumen($id)
{
    $dokumen = TrxDokumenKi::findOrFail($id);

    // path relatif di storage/app/public
    $path = $dokumen->file_path;

    if (!Storage::disk('public')->exists($path)) {
        abort(404, 'File tidak ditemukan');
    }

    return Storage::disk('public')->download($path);
}







    /**
     * Halaman Verifikasi Hak Cipta
     */
    public function hakCipta()
{
    $dataKi = TrxUsulanKi::with([
        'verifikasi.user',
        'mstKi',
        'user'
    ])
    ->where('mst_ki_id', 2) // ← INI SAJA BEDANYA
    ->latest()
    ->get();

    $reviewers = User::where('role', 'reviewer')->get();

    return view('admin.verifikator.hakcipta', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses', 2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses', 3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses', 4)->count(),
    ]);
}

    public function detailHakCipta($id)
{
    $data = TrxUsulanKi::with(['user','verifikasi','dokumen'])
        ->where('mst_ki_id', 2) // 2 = hak cipta
        ->where('trx_usulan_ki_id', $id)
        ->first();

    if (!$data) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success'   => true,
        'judul'     => $data->judul,
        'pemohon'   => $data->user->username ?? '-',
        'email'     => $data->user->email ?? '-',
        'tanggal'   => $data->tanggal,
        'deskripsi' => $data->deskripsi,
        'status'    => optional($data->verifikasi)->titik_proses,
        'dokumen'   => $data->dokumen ?? [],
    ]);
}
    /**
     * Halaman Verifikasi Merek
     */
    public function merek()
{
    $dataKi = TrxUsulanKi::with(['user','verifikasi','mstKi'])
        ->where('mst_ki_id', 3) // 3 = MEREK
        ->latest()
        ->get();

    $reviewers = User::where('role','reviewer')->get();

    return view('admin.verifikator.merek', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses',3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses',4)->count(),
    ]);
}

public function detailMerek($id)
{
    $data = TrxUsulanKi::with(['user','verifikasi','dokumen'])
        ->where('mst_ki_id', 3)
        ->where('trx_usulan_ki_id',$id)
        ->first();

    if(!$data){
        return response()->json([
            'success'=>false,
            'message'=>'Data tidak ditemukan'
        ],404);
    }

    return response()->json([
        'success'=>true,
        'judul'=>$data->judul,
        'pemohon'=>$data->user->username ?? '-',
        'email'=>$data->user->email ?? '-',
        'tanggal'=>$data->tanggal,
        'deskripsi'=>$data->deskripsi,
        'status'=>optional($data->verifikasi)->titik_proses,
        'dokumen'=>$data->dokumen ?? []
    ]);
}

    /**
     * Halaman Verifikasi Desain Industri
     */
    public function desainIndustri()
{
    $dataKi = TrxUsulanKi::with(['verifikasi.user', 'mstKi', 'user'])
        ->where('mst_ki_id', 4)
        ->latest()
        ->get();

    $reviewers = User::where('role', 'reviewer')->get();

    return view('admin.verifikator.desainindustri', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses', 2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses', 3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses', 4)->count(),
    ]);
}
    /**
     * Halaman Verifikasi Varietas Tanaman
     */
    public function varietasTanaman()
{
    $dataKi = TrxUsulanKi::with(['verifikasi.user', 'mstKi', 'user'])
        ->where('mst_ki_id', 5)
        ->latest()
        ->get();

    $reviewers = User::where('role', 'reviewer')->get();

    return view('admin.verifikator.varietastanaman', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses', 2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses', 3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses', 4)->count(),
    ]);
}

    /**
     * Halaman Verifikasi Desain Sirkuit
     */
    public function desainSirkuit()
{
    $dataKi = TrxUsulanKi::with(['verifikasi.user', 'mstKi', 'user'])
        ->where('mst_ki_id', 6)
        ->latest()
        ->get();

    $reviewers = User::where('role', 'reviewer')->get();

    return view('admin.verifikator.desainsirkuit', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses', 2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses', 3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses', 4)->count(),
    ]);
}

    /**
     * Halaman Verifikasi Indikasi Geografis
     */
    public function indikasiGeografis()
{
    $dataKi = TrxUsulanKi::with(['verifikasi.user', 'mstKi', 'user'])
        ->where('mst_ki_id', 7)
        ->latest()
        ->get();

    $reviewers = User::where('role', 'reviewer')->get();

    return view('admin.verifikator.indikasigeografis', [
        'data'          => $dataKi,
        'reviewers'     => $reviewers,
        'total'         => $dataKi->count(),
        'menunggu'      => $dataKi->where('verifikasi.titik_proses', 2)->count(),
        'terverifikasi' => $dataKi->where('verifikasi.titik_proses', 3)->count(),
        'ditolak'       => $dataKi->where('verifikasi.titik_proses', 4)->count(),
    ]);
}
}