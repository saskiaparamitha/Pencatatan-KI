<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPegawai;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->q ?? '';

        $pegawai = MstPegawai::when($query, function($q) use ($query) {
                        $q->where('nama', 'like', "%{$query}%")
                        ->orWhere('nip_pegawai', 'like', "%{$query}%");
                    })
                    ->limit(20)
                    ->get();

        return response()->json($pegawai);
    }
}