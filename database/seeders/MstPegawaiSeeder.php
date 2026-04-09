<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MstPegawai;

class MstPegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $pegawai = [
            ['nip_pegawai' => '100001', 'nama' => 'Prof. Dr. Budi Santoso, S.T., M.T.', 'satuan_kerja' => 'Teknik'],
            ['nip_pegawai' => '100002', 'nama' => 'Dr. Ir. Rina Kurniawati, M.Eng.', 'satuan_kerja' => 'Riset'],
            ['nip_pegawai' => '100003', 'nama' => 'Dr. Ahmad Fauzan, S.Kom., M.Kom.', 'satuan_kerja' => 'Informatika'],
            ['nip_pegawai' => '100004', 'nama' => 'Ir. Siti Aminah, M.T.', 'satuan_kerja' => 'Industri'],
            ['nip_pegawai' => '100005', 'nama' => 'Dr. Hendra Wijaya, S.T., M.Sc.', 'satuan_kerja' => 'Lingkungan'],
            ['nip_pegawai' => '100006', 'nama' => 'Dr. Maya Lestari, S.Si., M.Si.', 'satuan_kerja' => 'Kimia'],
            ['nip_pegawai' => '100007', 'nama' => 'Ir. Andi Pratama, M.Eng.', 'satuan_kerja' => 'Energi'],
        ];

        foreach ($pegawai as $p) {
            MstPegawai::updateOrCreate(
                ['nip_pegawai' => $p['nip_pegawai']],
                $p
            );
        }
    }
}
