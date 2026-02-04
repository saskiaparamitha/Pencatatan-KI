<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');

        $pegawai = Pegawai::where('nama', 'like', '%' . $query . '%')
                        ->get(['mst_pegawai_id as id', 'nama']); // ← alias mst_pegawai_id jadi "id"

        return response()->json($pegawai);
    }
}