<?php

namespace App\Http\Controllers;

use App\Models\TrxUsulanKI;
use App\Models\TrxUsulanKIDokumen;
use App\Models\TrxUsulanKIKolaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    // Mapping jenis KI ke ID database (dijadikan property class)
    private $kiMap = [
        'paten'              => 1,
        'hak_cipta'          => 2,
        'pvt'                => 3,
        'merek'              => 4,
        'desain_industri'    => 5,
        'desain_tlst'        => 6,
        'indikasi_geografis' => 7,
    ];

    /**
     * Halaman index pengajuan
     */
    public function index()
    {
        $userId = Auth::id();

        $total     = TrxUsulanKI::where('user_id', $userId)->count();

        $disetujui = TrxUsulanKI::where('user_id', $userId)
                                ->whereHas('status', fn($q) => $q->where('nama_status', 'Selesai'))
                                ->count();

        $diproses  = TrxUsulanKI::where('user_id', $userId)
                                ->whereHas('status', fn($q) => $q->whereIn('nama_status', ['Kirim', 'Terima', 'Proses Review']))
                                ->count();

        $ditolak   = TrxUsulanKI::where('user_id', $userId)
                                ->whereHas('status', fn($q) => $q->where('nama_status', 'Tolak'))
                                ->count();

        return view('user.pengajuan', compact('total', 'disetujui', 'diproses', 'ditolak'));
    }

    /**
     * Form Paten
     */
    public function createPaten()
    {
        $draft = $this->getDraft('paten');
        return view('user.paten', compact('draft'));
    }

    /**
     * Form Hak Cipta
     */
    public function createHakCipta()
    {
        $draft = $this->getDraft('hak_cipta');
        return view('user.hak-cipta', compact('draft'));
    }

    /**Form PVT */
    public function createPVT()
    {
        $draft = $this->getDraft('pvt');
        return view('user.pvt', compact('draft'));
    }

    /** Form Merek */
    public function createMerek()
    {
        $draft = $this->getDraft('merek');
        return view('user.merek', compact('draft'));
    }

    /**
     * Form Desain Industri
     */
    public function createDesainIndustri()
    {
        $draft = $this->getDraft('desain_industri');
        return view('user.desain-industri', compact('draft'));
    }

    /**
     * Form Desain TLST
     */
    public function createDesainTLST()
    {
        $draft = $this->getDraft('desain_tlst');
        return view('user.desain-tlst', compact('draft'));
    }

    /**
     * Form Indikasi Geografis
     */
    public function createIndikasiGeografis()
    {
        $draft = $this->getDraft('indikasi_geografis');
        return view('user.indikasi-geografis', compact('draft'));
    }

    /**
     * Get draft terakhir
     */
    private function getDraft($jenisKi)
    {
        return TrxUsulanKI::where('user_id', Auth::id())
            ->where('mst_ki_id', $this->kiMap[$jenisKi])
            // ->where('mst_status_id', 1) // DRAFT
            ->latest()
            ->first();
    }

    /**
     * Store pengajuan (submit final)
     */
    public function storeDataForm(Request $request)
    {
    // Validasi dasar untuk semua jenis KI
    $rules = [
        'jenis_ki'           => 'required|string',
        'judul'              => 'required|string|max:255',
        'deskripsi'          => 'required|string',
        'dokumen_deskripsi'  => 'required|array|min:1',
        'dokumen_deskripsi.*'=> 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        'kolaborator_ids'    => 'nullable|array',
        //'pernyataan'         => 'required|accepted',
    ];

    // Validasi spesifik per jenis KI
    switch ($request->jenis_ki) {
        case 'paten':
            $rules['jenis_paten'] = 'required|string';
            $rules['bidang_teknologi'] = 'required|string';
            $rules['tanggal_pembuatan'] = 'required|date';
            break;
        case 'hak_cipta':
            $rules['tempat_hak_cipta'] = 'required|string';
            $rules['tanggal_hak_cipta'] = 'required|date';
            break;
        case 'pvt':
            $rules['nama_umum_pvt'] = 'required|string';
            $rules['nama_usulan_pvt'] = 'required|string';
            $rules['negara_asal_pvt'] = 'required|string';
            $rules['informasi_teknis'] = 'required|string';
            $rules['tanggal_pvt'] = 'required|date';
            break;
        case 'merek':
            $rules['uraian_warna_merek'] = 'required|string';
            $rules['arti_merek'] = 'required|string';
            $rules['kuasa_merek'] = 'required|string';
            $rules['tanggal_merek'] = 'required|date';
            break;
        case 'desain_industri':
            $rules['tanggal_desain_industri'] = 'required|date';
            break;
        case 'desain_tlst':
            $rules['tanggal_pertama_dientry'] = 'required|date';
            $rules['jumlah_lisensi'] = 'required|string';
            $rules['tanggal_desain_tlst'] = 'required|date';
            break;
        case 'indikasi_geografis':
            $rules['nama_barang_indikasi_geografis'] = 'required|string';
            $rules['kualitas_indikasi_geografis'] = 'required|string';
            $rules['karakteristik_indikasi_geografis'] = 'required|string';
            $rules['kelas_nice_indikasi_geografis'] = 'required|string';
            $rules['sejarah'] = 'required|string';
            $rules['tradisi'] = 'required|string';
            $rules['jumlah_lisensi_indikasi_geografis'] = 'required|string';
            $rules['tanggal_indikasi_geografis'] = 'required|date';
            break;
    }

    $request->validate($rules);

    DB::beginTransaction();
    
    try {
        // Persiapan data untuk insert
        $data = [
            'mst_ki_id' => $this->kiMap[$request->jenis_ki],
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'mst_status_id'  => 2, // 2 = 'Kirim'
        ];

        // Tentukan field tanggal sesuai jenis KI
        $data['tanggal'] = $request->tanggal_pembuatan
            ?? $request->tanggal_hak_cipta
            ?? $request->tanggal_pvt
            ?? $request->tanggal_merek
            ?? $request->tanggal_desain_industri
            ?? $request->tanggal_desain_tlst
            ?? $request->tanggal_indikasi_geografis
            ?? now();

        // Simpan data utama
        $usulan = TrxUsulanKI::create($data);

        // Upload dokumen
        $this->uploadDokumen($request, $usulan);

        // Simpan kolaborator
        // $this->saveKolaborator($request, $usulan);

        // Simpan kolaborator hanya kalau ada yang dipilih
        if ($request->has('kolaborator_ids') && !empty(array_filter($request->kolaborator_ids))) {
            $this->saveKolaborator($request, $usulan);
        }

        DB::commit();

        return redirect()->route('user.dashboard')
            ->with('success', 'Pengajuan berhasil disubmit!');
            
    } catch (\Exception $e) {
        DB::rollBack();
        
        return back()->withInput()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    /**
     * Simpan draft
     */
    public function saveDraft(Request $request)
    {
        DB::beginTransaction();
        
        try {
            // Cek apakah update draft atau buat baru
            if ($request->usulan_id) {
                $usulan = TrxUsulanKI::findOrFail($request->usulan_id);
                
                if ($usulan->user_id != Auth::id()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Unauthorized'
                    ], 403);
                }
                
                $usulan->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,

                    // PATEN
                    'jenis_paten' => $request->jenis_paten,
                    'bidang_teknologi' => $request->bidang_teknologi,

                    // HAK CIPTA
                    'tempat_hak_cipta' => $request->tempat_hak_cipta,
                    'tanggal_hak_cipta' => $request->tanggal_hak_cipta,

                    // PVT
                    'nama_umum_pvt' => $request->nama_umum_pvt,
                    'nama_usulan_pvt' => $request->nama_usulan_pvt,
                    'negara_asal_pvt' => $request->negara_asal_pvt,
                    'informasi_teknis' => $request->informasi_teknis,

                    // MEREK
                    'uraian_warna_merek' => $request->uraian_warna_merek,
                    'arti_merek' => $request->arti_merek,
                    'kuasa_merek' => $request->kuasa_merek,

                    // DTLST
                    'tanggal_pertama_dientry' => $request->tanggal_pertama_dientry,
                    'jumlah_lisensi' => $request->jumlah_lisensi,
                    
                    // Geografis
                    'nama_indikasi_geografis' => $request->nama_indikasi_geografis,
                    'nama_barang_indikasi_geografis' => $request->nama_barang_indikasi_geografis,
                    'kualitas_indikasi_geografis' => $request->kualitas_indikasi_geografis,
                    'karakteristik_indikasi_geografis' => $request->karakteristik_indikasi_geografis,
                    'kelas_nice_indikasi_geografis' => $request->kelas_nice_indikasi_geografis,
                    'sejarah' => $request->sejarah,
                    'tradisi' => $request->tradisi,
                    'jumlah_lisensi_indikasi_geografis' => $request->jumlah_lisensi_indikasi_geografis,
                ]);
            } else {
                // Buat draft baru
                $usulan = TrxUsulanKI::create([
                    'mst_ki_id' => $this->kiMap[$request->jenis_ki],
                    'user_id'   => Auth::id(),
                    'judul'     => $request->judul ?? 'Draft',
                    'tanggal'   => $request->tanggal_pembuatan ?? now(),
                    'deskripsi' => $request->deskripsi ?? '',
                    'status'    => 'draft',
                    'jenis_paten'       => $request->jenis_paten,
                    'bidang_teknologi'  => $request->bidang_teknologi,
                    'jenis_ciptaan'     => $request->jenis_ciptaan,
                    'kategori'          => $request->kategori,
                ]);
            }

            // Upload dokumen jika ada
            if ($request->hasFile('dokumen_deskripsi') || 
                $request->hasFile('gambar') || 
                $request->hasFile('surat_pernyataan')) {
                $this->uploadDokumen($request, $usulan);
            }

            // Simpan kolaborator jika ada
            if ($request->has('kolaborator_ids')) {
                $this->saveKolaborator($request, $usulan);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Draft berhasil disimpan!',
                'usulan_id' => $usulan->trx_usulan_ki_id
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan draft: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Upload dokumen ke storage dan database
     */
    private function uploadDokumen(Request $request, $usulan)
    {
        $usulanId = $usulan->trx_usulan_ki_id;

        // Upload dokumen deskripsi (multiple)
        if ($request->hasFile('dokumen_deskripsi')) {
            foreach ($request->file('dokumen_deskripsi') as $file) {
                if ($file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs(
                        'dokumen_deskripsi/' . $usulanId, 
                        $fileName, 
                        'public'
                    );

                    TrxUsulanKIDokumen::create([
                        'trx_usulan_ki_id' => $usulanId,
                        'nama_dokumen' => $file->getClientOriginalName(),
                        'tipe_dokumen' => 'dokumen_deskripsi',
                        'file_path' => $filePath,
                    ]);
                }
            }
        }

        // Upload gambar/ilustrasi (single, opsional)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs(
                'gambar/' . $usulanId, 
                $fileName, 
                'public'
            );

            TrxUsulanKIDokumen::create([
                'trx_usulan_ki_id' => $usulanId,
                'nama_dokumen' => $file->getClientOriginalName(),
                'tipe_dokumen' => 'gambar',
                'file_path' => $filePath,
            ]);
        }

        // Upload surat pernyataan (multiple, opsional)
        if ($request->hasFile('surat_pernyataan')) {
            foreach ($request->file('surat_pernyataan') as $file) {
                if ($file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs(
                        'surat_pernyataan/' . $usulanId, 
                        $fileName, 
                        'public'
                    );

                    TrxUsulanKIDokumen::create([
                        'trx_usulan_ki_id' => $usulanId,
                        'nama_dokumen' => $file->getClientOriginalName(),
                        'tipe_dokumen' => 'surat_pernyataan',
                        'file_path' => $filePath,
                    ]);
                }
            }
        }
    }

    public function show($id)
    {
        $pengajuan = TrxUsulanKI::with(['status', 'mstKI', 'dokumen', 'kolaborator.pegawai'])
                                ->where('user_id', Auth::id())
                                ->findOrFail($id);

        return view('user.pengajuan-detail', compact('pengajuan'));
    }

    public function riwayat()
    {
        $pengajuan = TrxUsulanKI::where('user_id', Auth::id())
                                ->with('status', 'mstKI')
                                ->orderBy('updated_at', 'desc')
                                ->get();

        return view('user.riwayat', compact('pengajuan'));
    }

    public function searchPegawai(Request $request)
    {
        $query = $request->get('q', '');
        
        $pegawai = \App\Models\MstPegawai::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('nip_pegawai', 'LIKE', "%{$query}%")
            ->select('mst_pegawai_id', 'nama', 'nip_pegawai', 'satuan_kerja')
            ->limit(10)
            ->get();
        
        return response()->json($pegawai);
    }

    /** Simpan kolaborator */
    private function saveKolaborator(Request $request, $usulan)
    {
        if (!$request->has('kolaborator_ids')) {
            return;
        }

        // Simpan kolaborator baru
        $kolaboratorIds = array_filter($request->kolaborator_ids, fn($v) => !empty(trim($v)));
        
        if (empty($kolaboratorIds)) {
            return;
        }

        // Hapus kolaborator lama
        TrxUsulanKIKolaborator::where('trx_usulan_ki_id', $usulan->trx_usulan_ki_id)->delete();

        foreach ($kolaboratorIds as $pegawaiId) {
            TrxUsulanKIKolaborator::create([
                'trx_usulan_ki_id' => $usulan->trx_usulan_ki_id,
                'mst_pegawai_id'   => (int) $pegawaiId,
            ]);
        }
    }

    /**
     * Delete dokumen
     */
    public function deleteDokumen($id)
    {
        try {
            $dokumen = TrxUsulanKIDokumen::findOrFail($id);
            
            // Pastikan dokumen milik user yang login
            if ($dokumen->usulanKi->user_id != Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
            
            // Hapus file dari storage
            if (Storage::disk('public')->exists($dokumen->file_path)) {
                Storage::disk('public')->delete($dokumen->file_path);
            }
            
            $dokumen->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil dihapus'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus dokumen: ' . $e->getMessage()
            ], 500);
        }
    }
}