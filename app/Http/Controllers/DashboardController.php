<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\TrxUsulanKI;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics and recent data
     */
    public function index()
    {
        $userId = Auth::id();

        $disetujui = TrxUsulanKI::where('user_id', $userId)
                                ->whereHas('status', fn($q) => $q->where('nama_status', 'Selesai'))
                                ->count();

        $diproses = TrxUsulanKI::where('user_id', $userId)
                                ->where('mst_status_id', 2) // 2 = 'Kirim'
                                ->count();

        $ditolak   = TrxUsulanKI::where('user_id', $userId)
                                ->whereHas('status', fn($q) => $q->where('nama_status', 'Tolak'))
                                ->count();

        // Ambil 3 pengajuan terbaru dengan status terbaru
        $statusTerbaru = TrxUsulanKI::where('user_id', $userId)
                                    ->with('status')
                                    ->orderBy('updated_at', 'desc')
                                    ->take(3)
                                    ->get();

        //dd($diproses, $statusTerbaru);

        // Jika request normal, return view dengan semua data
        return view('user.dashboard', compact(
            'disetujui',
            'diproses',
            'ditolak',
            'statusTerbaru'
        ));
    }
}