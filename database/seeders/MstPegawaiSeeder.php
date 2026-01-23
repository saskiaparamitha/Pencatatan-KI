<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstPegawaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mst_pegawai')->insert([
            [
                'nama' => 'Saskia',
                'nip_pegawai' => '111111', // Pegawai (Pengusul utama)
                'satuan_kerja' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sekar',
                'nip_pegawai' => '111112', // Pegawai (Pengusul kolaborator)
                'satuan_kerja' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Putri',
                'nip_pegawai' => '222222', // Verifikator
                'satuan_kerja' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ratu',
                'nip_pegawai' => '333333', // Reviewer
                'satuan_kerja' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
