<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TrxUsulanKi;
use App\Models\TrxVerifikasi;
use Carbon\Carbon;

class ReviewerController extends Controller
{

    /**
     * HALAMAN PATEN REVIEWER
     */
    public function paten()
    {
        $paten = TrxUsulanKi::with([
            'verifikasi',
            'user',
            'mstKi'
        ])
        ->where('mst_ki_id', 1)
        ->latest()
        ->get();

        return view('admin.reviewer.paten', [

            'data' => $paten,

            'total' => $paten->count(),

            'menunggu' => $paten->filter(fn($item) =>
                optional($item->verifikasi)->titik_proses == 2
            )->count(),

            'terverifikasi' => $paten->filter(fn($item) =>
                optional($item->verifikasi)->titik_proses == 3
            )->count(),

            'ditolak' => $paten->filter(fn($item) =>
                optional($item->verifikasi)->titik_proses == 4
            )->count(),
        ]);
    }


    /**
     * DETAIL PATEN (AJAX)
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
            'judul' => $usulan->judul,
            'pemohon' => $usulan->user->username ?? '-',
            'email' => $usulan->user->email ?? '-',
            'tanggal' => $usulan->tanggal
                ? Carbon::parse($usulan->tanggal)->translatedFormat('d F Y')
                : '-',
            'deskripsi' => $usulan->deskripsi ?? '-',
            'status' => optional($usulan->verifikasi)->titik_proses,
            'dokumen' => $usulan->dokumen ?? [],
            'kolaborator' => $usulan->kolaborator ?? [],
        ]);
    }


    /**
     * APPROVE PATEN
     */
    public function approvePengajuan($id)
    {
        TrxVerifikasi::updateOrCreate(
            ['trx_usulan_ki_id' => $id],
            [
                'titik_proses' => 3,
                'mst_status_id' => 3,
                'user_id' => Auth::id()
            ]
        );

        return response()->json([
            'success' => true
        ]);
    }


    /**
     * REJECT PATEN
     */
    public function rejectPengajuan(Request $request, $id)
    {
        TrxVerifikasi::updateOrCreate(
            ['trx_usulan_ki_id' => $id],
            [
                'titik_proses' => 4,
                'mst_status_id' => 4,
                'user_id' => Auth::id(),
                'catatan' => $request->komentar
            ]
        );

        return response()->json([
            'success' => true
        ]);
    }


    /**
     * TAMBAH KOMENTAR
     */
    public function addComment(Request $request, $id)
    {
        TrxVerifikasi::updateOrCreate(
            ['trx_usulan_ki_id' => $id],
            [
                'user_id' => Auth::id(),
                'catatan' => $request->komentar
            ]
        );

        return response()->json([
            'success' => true
        ]);
    }



    public function hakCipta()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',2)
        ->latest()
        ->get();

    return view('admin.reviewer.hakcipta',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
   }

   public function merek()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',3)
        ->latest()
        ->get();

    return view('admin.reviewer.merek',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
    }

    public function desainIndustri()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',4)
        ->latest()
        ->get();

    return view('admin.reviewer.desainindustri',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
    }
    public function varietasTanaman()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',5)
        ->latest()
        ->get();

    return view('admin.reviewer.varietastanaman',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
    }
    public function desainSirkuit()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',6)
        ->latest()
        ->get();

    return view('admin.reviewer.desainsirkuit',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
    }
    public function indikasiGeografis()
    {
    $data = TrxUsulanKi::with(['verifikasi','user','mstKi'])
        ->where('mst_ki_id',7)
        ->latest()
        ->get();

    return view('admin.reviewer.indikasigeografis',[
        'data'=>$data,
        'total'=>$data->count(),
        'menunggu'=>$data->where('verifikasi.titik_proses',2)->count(),
        'terverifikasi'=>$data->where('verifikasi.titik_proses',3)->count(),
        'ditolak'=>$data->where('verifikasi.titik_proses',4)->count(),
    ]);
    }




}