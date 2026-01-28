<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstKiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mst_ki')->insert([
            ['mst_ki_id' => 1, 'nama_ki' => 'Paten'],
            ['mst_ki_id' => 2, 'nama_ki' => 'Hak Cipta'],
            ['mst_ki_id' => 3, 'nama_ki' => 'PVT'],
            ['mst_ki_id' => 4, 'nama_ki' => 'Merek'],
            ['mst_ki_id' => 5, 'nama_ki' => 'Desain Industri'],
            ['mst_ki_id' => 6, 'nama_ki' => 'Desain TSLT'],
            ['mst_ki_id' => 7, 'nama_ki' => 'Indikasi Geografis'],
            ['mst_ki_id' => 8, 'nama_ki' => 'Jejaring IP-PORT'],
            ['mst_ki_id' => 9, 'nama_ki' => 'FTO'],
        ]);
    }
}
