<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrxDokumenKiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('trx_usulan_ki_dokumen')->insert([
    [
        'trx_usulan_ki_id' => 1,
        'nama_dokumen'    => 'Proposal Paten',
        'tipe_dokumen'    => 'pdf',
        'file_path'       => 'dokumen/proposal_paten.pdf',
        'created_at'      => now(),
        'updated_at'      => now(),
    ],
    [
        'trx_usulan_ki_id' => 1,
        'nama_dokumen'    => 'Gambar Teknis',
        'tipe_dokumen'    => 'image',
        'file_path'       => 'dokumen/gambar_teknis.jpg',
        'created_at'      => now(),
        'updated_at'      => now(),
    ],
    [
        'trx_usulan_ki_id' => 2,
        'nama_dokumen'    => 'Surat Pernyataan',
        'tipe_dokumen'    => 'pdf',
        'file_path'       => 'dokumen/surat_pernyataan.pdf',
        'created_at'      => now(),
        'updated_at'      => now(),
    ],
]);

    }
}
