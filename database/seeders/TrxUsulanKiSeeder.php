<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrxUsulanKiSeeder extends Seeder
{
    public function run(): void
    {
        $pegawaiIds = DB::table('users')
            ->where('role', 'pegawai')
            ->pluck('user_id')
            ->toArray();

        if (empty($pegawaiIds)) {
            return;
        }

        $jenisKi = [
            1 => [
                'nama' => 'Paten',
                'judul' => 'Inovasi Teknologi Paten',
                'deskripsi' => 'Deskripsi pengajuan paten'
            ],
            2 => [
                'nama' => 'Hak Cipta',
                'judul' => 'Karya Hak Cipta',
                'deskripsi' => 'Deskripsi pengajuan hak cipta'
            ],
            3 => [
                'nama' => 'Merek',
                'judul' => 'Merek Dagang',
                'deskripsi' => 'Deskripsi pengajuan merek'
            ],
            4 => [
                'nama' => 'Desain Industri',
                'judul' => 'Desain Produk Industri',
                'deskripsi' => 'Deskripsi pengajuan desain industri'
            ],
            5 => [
                'nama' => 'Varietas Tanaman',
                'judul' => 'Varietas Tanaman Unggul',
                'deskripsi' => 'Deskripsi pengajuan varietas tanaman'
            ],
            6 => [
                'nama' => 'Desain Sirkuit',
                'judul' => 'Desain Tata Letak Sirkuit',
                'deskripsi' => 'Deskripsi pengajuan desain sirkuit'
            ],
            7 => [
                'nama' => 'Indikasi Geografis',
                'judul' => 'Produk Indikasi Geografis',
                'deskripsi' => 'Deskripsi pengajuan indikasi geografis'
            ],
        ];

        $counter = 1;

        foreach ($jenisKi as $mst_ki_id => $data) {

            // Bikin 5 data per jenis supaya semua pasti ada
            for ($i = 1; $i <= 5; $i++) {

                DB::table('trx_usulan_ki')->insert([
                    'mst_ki_id' => $mst_ki_id,
                    'user_id'   => $pegawaiIds[array_rand($pegawaiIds)],
                    'judul'     => "{$data['judul']} #{$counter}",
                    'deskripsi' => "{$data['deskripsi']} nomor {$counter}",
                    'tanggal'   => Carbon::now()->subDays(rand(1, 90)),
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);

                $counter++;
            }
        }
    }
}