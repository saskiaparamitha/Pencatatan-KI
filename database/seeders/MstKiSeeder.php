<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstKiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['mst_ki_id' => 1, 'nama_ki' => 'Paten'],
            ['mst_ki_id' => 2, 'nama_ki' => 'Hak Cipta'],
            ['mst_ki_id' => 3, 'nama_ki' => 'Merek'],
            ['mst_ki_id' => 4, 'nama_ki' => 'Desain Industri'],
            ['mst_ki_id' => 5, 'nama_ki' => 'Varietas Tanaman'],
            ['mst_ki_id' => 6, 'nama_ki' => 'Desain Sirkuit'],
            ['mst_ki_id' => 7, 'nama_ki' => 'Indikasi Geografis'],
        ];

        foreach ($data as $item) {
            DB::table('mst_ki')->updateOrInsert(
                ['mst_ki_id' => $item['mst_ki_id']],
                ['nama_ki' => $item['nama_ki']]
            );
        }
    }
}