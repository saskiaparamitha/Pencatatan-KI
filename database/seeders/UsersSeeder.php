<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'mst_pegawai_id' => 1,
                'username' => 'pegawai1',
                'email' => 'pegawai1@ki.test',
                'password' => Hash::make('pegawai1123'),
                'role' => 'pegawai',
            ],
            [
                'mst_pegawai_id' => 2,
                'username' => 'pegawai2',
                'email' => 'pegawai2@ki.test',
                'password' => Hash::make('pegawai2123'),
                'role' => 'pegawai',
            ],
            [
                'mst_pegawai_id' => 3,
                'username' => 'verifikator',
                'email' => 'verifikator@ki.test',
                'password' => Hash::make('verifikator123'),
                'role' => 'verifikator',
            ],
            [
                'mst_pegawai_id' => 4,
                'username' => 'reviewer',
                'email' => 'reviewer@ki.test',
                'password' => Hash::make('reviewer123'),
                'role' => 'reviewer',
            ],
        ]);
    }
}
