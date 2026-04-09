<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'pegawai1',
                'mst_pegawai_id' => 1,
                'email' => 'pegawai1@ki.test',
                'password' => bcrypt('password'),
                'role' => 'pegawai',
            ],
            [
                'username' => 'pegawai2',
                'mst_pegawai_id' => 2,
                'email' => 'pegawai2@ki.test',
                'password' => bcrypt('password'),
                'role' => 'pegawai',
            ],
            [
                'username' => 'verifikator',
                'mst_pegawai_id' => 3,
                'email' => 'verifikator@ki.test',
                'password' => bcrypt('password'),
                'role' => 'verifikator',
            ],

            // reviewer profesional (banyak opsi)
            [
                'username' => 'reviewer_ahmad',
                'mst_pegawai_id' => 4,
                'email' => 'ahmad.reviewer@ki.test',
                'password' => bcrypt('password'),
                'role' => 'reviewer',
            ],
            [
                'username' => 'reviewer_rina',
                'mst_pegawai_id' => 5,
                'email' => 'rina.reviewer@ki.test',
                'password' => bcrypt('password'),
                'role' => 'reviewer',
            ],
            [
                'username' => 'reviewer_budi',
                'mst_pegawai_id' => 6,
                'email' => 'budi.reviewer@ki.test',
                'password' => bcrypt('password'),
                'role' => 'reviewer',
            ],
        ]);
    }
}
