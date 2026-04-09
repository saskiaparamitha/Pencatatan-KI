<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        MstPegawaiSeeder::class,
        UsersSeeder::class,        // ⬅️ user dulu
        MstKiSeeder::class,
        MstStatusSeeder::class,
        TrxUsulanKiSeeder::class, // ⬅️ baru usulan
        TrxDokumenKiSeeder::class,
        TrxVerifikasiSeeder::class, // ⬅️ terakhir
    ]);
}
}
