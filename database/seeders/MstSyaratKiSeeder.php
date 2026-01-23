<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MstSyaratKiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_syarat_ki')->insert([
            // Paten (mst_ki_id = 1)
            [
                'mst_ki_id' => 1,
                'nama_syarat' => 'Jenis Paten',
                'tipe' => 'json',
                'value' => json_encode([
                    '1' => 'Paten Biasa',
                    '2' => 'Paten Sederhana',
                ]),
            ],
            [
                'mst_ki_id' => 1,
                'nama_syarat' => 'Bidang Teknologi',
                'tipe' => 'json',
                'value' => json_encode([
                    '1' => 'Baterai',
                    '2' => 'Biologi',
                    '3' => 'Biomassa dan Biomaterial',
                    '4' => 'Bioteknologi',
                    '5' => 'Energi Baru dan Terbarukan',
                    '6' => 'Farmasi',
                    '7' => 'Kelistrikan',
                    '8' => 'Kimia Material',
                    '9' => 'Kimia Non-Organik',
                    '10' => 'Kimia Organik',
                    '11' => 'Obat Herbal',
                    '12' => 'Metalurgi',
                    '13' => 'Nanoteknologi',
                    '14' => 'Optik dan Sensor',
                    '15' => 'Pakan',
                    '16' => 'Pangan',
                    '17' => 'Penginderaan Jauh',
                    '18' => 'Semikonduktor',
                    '19' => 'Teknologi Komputer',
                    '20' => 'Teknologi Medis',
                    '21' => 'Teknologi Pengukuran',
                    '22' => 'Teknologi Transportasi',
                    '23' => 'Telekomunikasi',
                    '24' => 'Mesin dan Elektronika',
                ]),
            ],

            // Hak Cipta (mst_ki_id = 2)
            [
                'mst_ki_id' => 2,
                'nama_syarat' => 'Tempat Hak Cipta',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 2,
                'nama_syarat' => 'Tanggal Hak Cipta',
                'tipe' => 'date',
                'value' => null,
            ],
                        
            // PVT (mst_ki_id = 3)
            [
                'mst_ki_id' => 3,
                'nama_syarat' => 'Judul PVT',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 3,
                'nama_syarat' => 'Nama Umum PVT',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 3,
                'nama_syarat' => 'Negara Asal PVT',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 3,
                'nama_syarat' => 'Informasi Teknis',
                'tipe' => 'text',
                'value' => null,
            ],

            // Merek (mst_ki_id = 4)
            [
                'mst_ki_id' => 4,
                'nama_syarat' => 'Uraian Warna Merek',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 4,
                'nama_syarat' => 'Arti Merek',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 4,
                'nama_syarat' => 'Kuasa Merek',
                'tipe' => 'text',
                'value' => null,
            ],

            // Desain Industri (mst_ki_id = 5)
            
            // Desain TLST (Sirkuit Terpadu) (mst_ki_id = 6)
            [
                'mst_ki_id' => 6,
                'nama_syarat' => 'Tanggal Pertama di Entry',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 6,
                'nama_syarat' => 'Jumlah lisensi DTLST',
                'tipe' => 'text',
                'value' => null,
            ],

            // Indikasi Geografis (mst_ki_id = 7)
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Nama Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Nama Barang Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Kualitas Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Karakteristik Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],
[
                'mst_ki_id' => 7,
                'nama_syarat' => 'Kelas Nice Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Sejarah',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Tradisi',
                'tipe' => 'text',
                'value' => null,
            ],
            [
                'mst_ki_id' => 7,
                'nama_syarat' => 'Jumlah Lisensi Indikasi Geografis',
                'tipe' => 'text',
                'value' => null,
            ],

            // Jejaring IP-PORT (mst_ki_id = 8)
            
            // FTO (mst_ki_id = 9)
            
        ]);
    }
}
