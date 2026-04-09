<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TrxVerifikasiSeeder extends Seeder
{
    public function run(): void
    {
        $reviewers = User::where('role', 'reviewer')
            ->pluck('user_id')
            ->toArray();

        $usulanList = DB::table('trx_usulan_ki')->get();

        foreach ($usulanList as $usulan) {

            $statusPool = [2,2,2,3,3,4];
            $status = $statusPool[array_rand($statusPool)];

            DB::table('trx_verifikasi')->insert([
                'trx_usulan_ki_id' => $usulan->trx_usulan_ki_id,
                'titik_proses'     => $status,
                'mst_status_id'    => $status,
                'user_id'          => $reviewers[array_rand($reviewers)], // WAJIB isi
                'catatan'          => $status == 4 ? 'Dokumen belum lengkap' : null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}