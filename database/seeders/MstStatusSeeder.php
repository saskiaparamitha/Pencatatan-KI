<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mst_status')->insert([
            [
                'nama_status' => 'Draft',
                'deskripsi_proses' => 'Usulan masih dalam bentuk draft',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Kirim',
                'deskripsi_proses' => 'Usulan telah dikirim oleh pengusul',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Terima',
                'deskripsi_proses' => 'Usulan diterima oleh verifikator',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Tolak',
                'deskripsi_proses' => 'Usulan ditolak',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Proses Review',
                'deskripsi_proses' => 'Usulan sedang direview',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Selesai',
                'deskripsi_proses' => 'Proses usulan selesai',
                'pesan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
