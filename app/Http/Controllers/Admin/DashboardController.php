<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TrxUsulanKi;
use App\Models\TrxVerifikasi;

class DashboardController extends Controller
{
public function index()
{
    $role = Auth::user()->role;

    $statusVerified = $role === 'verifikator' ? 3 : 6;
    $statusPending  = $role === 'verifikator' ? 2 : 5;
    $statusRejected = 4;

    // ✅ aktivitas terbaru
    $activities = TrxVerifikasi::with(['usulan.mstKi'])
        ->latest()
        ->limit(5)
        ->get();

    // ✅ DATA CHART (INI YANG KAMU TANYAIN)
    $chartPaten = TrxUsulanKi::where('mst_ki_id', 1)
        ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->pluck('total', 'bulan');

    $chartHakCipta = TrxUsulanKi::where('mst_ki_id', 2)
        ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->pluck('total', 'bulan');

    // ⬇️⬇️⬇️ INI BAGIAN "LALU KIRIM KE VIEW"
    return view('admin.dashboard', [
        'verifiedCount' => TrxVerifikasi::where('titik_proses', $statusVerified)->count(),
        'pendingCount'  => TrxVerifikasi::where('titik_proses', $statusPending)->count(),
        'rejectedCount' => TrxVerifikasi::where('titik_proses', $statusRejected)->count(),
        'activities'    => $activities,

        // 👇 INI YANG DIMAKSUD “KIRIM KE VIEW”
        'chartPaten'    => $chartPaten,
        'chartHakCipta' => $chartHakCipta,
    ]);
}

}
