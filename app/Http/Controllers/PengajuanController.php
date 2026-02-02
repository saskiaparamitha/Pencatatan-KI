<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('user.pengajuan');
    }

    public function createPaten()
    {
        return view('user.paten');
    }

    public function createHakCipta()
    {
        return view('user.hak-cipta');
    }

    public function createPVT()
    {
        return view('user.pvt');
    }

    public function createMerek()
    {
        return view('user.merek');
    }

    public function createDesainIndustri()
    {
        return view('user.desain-industri');
    }

    public function createDesainTLST()
    {
        return view('user.desain-tlst');
    }

    public function createIndikasiGeografis()
    {
        return view('user.indikasi-geografis');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan data pengajuan
        
        return redirect()->route('user.dashboard')
            ->with('success', 'Pengajuan berhasil disimpan!');
    }
}