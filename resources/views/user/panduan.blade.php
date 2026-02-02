@extends('layouts.app')

@section('title', 'Panduan - Pencatatan KI')

@section('content')
<div class="min-h-screen flex flex-col">
    <!-- Main Content -->
    <div class="flex-grow">
        <div class="bg-white rounded-xl shadow-md">
            <!-- Page Header -->
            <div class="border-b border-gray-200 px-8 py-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Panduan</h2>
                        <p class="text-gray-600 text-sm mt-1">Panduan lengkap mengenai jenis-jenis Kekayaan Intelektual</p>
                    </div>
                </div>
            </div>

            <!-- Accordion Container - Diperbesar -->
            <div class="px-8 py-8">
                <!-- Accordion List -->
                <div class="space-y-3">
                    <!-- Paten -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('paten')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Paten</span>
                            <svg id="icon-paten" class="w-6 h-6 text-grey-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-paten" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Paten</strong> adalah hak eksklusif yang diberikan oleh negara kepada inventor atas hasil invensinya di bidang teknologi. Paten memberikan hak kepada pemegangnya untuk menggunakan invensi tersebut selama jangka waktu tertentu.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Deskripsi invensi secara lengkap</li>
                                    <li>Klaim paten</li>
                                    <li>Abstrak</li>
                                    <li>Gambar teknis (jika ada)</li>
                                    <li>Surat pernyataan kepemilikan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Hak Cipta -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('hak-cipta')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Hak Cipta</span>
                            <svg id="icon-hak-cipta" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-hak-cipta" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Hak Cipta</strong> adalah hak eksklusif pencipta yang timbul secara otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk nyata tanpa mengurangi pembatasan sesuai dengan ketentuan peraturan perundang-undangan.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>File ciptaan (dokumen, audio, video, dll)</li>
                                    <li>Surat pernyataan keaslian ciptaan</li>
                                    <li>KTP pencipta</li>
                                    <li>Deskripsi ciptaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Merek -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('merek')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Merek</span>
                            <svg id="icon-merek" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-merek" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Merek</strong> adalah tanda yang dapat ditampilkan secara grafis berupa gambar, logo, nama, kata, huruf, angka, susunan warna, dalam bentuk 2 dimensi dan/atau 3 dimensi, suara, hologram, atau kombinasi dari 2 atau lebih unsur tersebut untuk membedakan barang dan/atau jasa yang diproduksi.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Logo/label merek (format JPG/PNG)</li>
                                    <li>Deskripsi barang/jasa</li>
                                    <li>Kelas merek (Nice Classification)</li>
                                    <li>Surat pernyataan kepemilikan merek</li>
                                    <li>KTP/NPWP pemohon</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Desain Industri -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('desain-industri')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Desain Industri</span>
                            <svg id="icon-desain-industri" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-desain-industri" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Desain Industri</strong> adalah suatu kreasi tentang bentuk, konfigurasi atau komposisi garis atau warna, atau garis dan warna, atau gabungan daripadanya yang berbentuk tiga dimensi atau dua dimensi yang memberikan kesan estetis dan dapat diwujudkan dalam pola tiga dimensi atau dua dimensi serta dapat dipakai untuk menghasilkan suatu produk.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Gambar desain tampak depan, belakang, samping</li>
                                    <li>Gambar perspektif</li>
                                    <li>Uraian desain</li>
                                    <li>Surat pernyataan kepemilikan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Varietas Tanaman -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('varietas-tanaman')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Varietas Tanaman</span>
                            <svg id="icon-varietas-tanaman" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-varietas-tanaman" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Perlindungan Varietas Tanaman (PVT)</strong> adalah perlindungan khusus yang diberikan negara kepada varietas tanaman yang dihasilkan oleh pemulia tanaman melalui kegiatan pemuliaan tanaman.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Deskripsi teknis varietas</li>
                                    <li>Foto tanaman</li>
                                    <li>Hasil uji lapangan</li>
                                    <li>Silsilah pemuliaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Desain Sirkuit -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('desain-sirkuit')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Desain Sirkuit</span>
                            <svg id="icon-desain-sirkuit" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-desain-sirkuit" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Desain Tata Letak Sirkuit Terpadu (DTLST)</strong> adalah kreasi berupa rancangan peletakan tiga dimensi dari berbagai elemen, sekurang-kurangnya satu dari elemen tersebut adalah elemen aktif, serta sebagian atau semua interkoneksi dalam suatu sirkuit terpadu.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Gambar tata letak sirkuit</li>
                                    <li>Dokumen teknis</li>
                                    <li>Spesifikasi produk</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Indikasi Geografis -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('indikasi-geografis')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Indikasi Geografis</span>
                            <svg id="icon-indikasi-geografis" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-indikasi-geografis" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Indikasi Geografis</strong> adalah suatu tanda yang menunjukkan daerah asal suatu barang dan/atau produk yang karena faktor lingkungan geografis termasuk faktor alam, faktor manusia atau kombinasi dari kedua faktor tersebut memberikan reputasi, kualitas, dan karakteristik tertentu pada barang dan/atau produk yang dihasilkan.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Dokumen yang diperlukan:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Buku persyaratan</li>
                                    <li>Peta wilayah geografis</li>
                                    <li>Foto produk</li>
                                    <li>Surat kuasa dari komunitas</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Aplikasi SI-PORT -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('aplikasi-siport')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Aplikasi SI-PORT</span>
                            <svg id="icon-aplikasi-siport" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-aplikasi-siport" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>SI-PORT (Sistem Informasi Pencatatan Online Research and Technology)</strong> adalah platform digital untuk pencatatan dan pengelolaan kekayaan intelektual secara online.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Fitur utama:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Pendaftaran pengajuan KI secara online</li>
                                    <li>Tracking status pengajuan real-time</li>
                                    <li>Upload dokumen digital</li>
                                    <li>Notifikasi otomatis</li>
                                    <li>Dashboard monitoring</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Freedom To Operate -->
                    <div class="border border-gray-300 rounded-lg">
                        <button onclick="toggleAccordion('freedom-operate')" class="w-full flex items-center justify-between px-6 py-5 bg-gray-50 hover:bg-gray-100 transition rounded-lg">
                            <span class="text-gray-800 font-medium text-lg">Freedom To Operate</span>
                            <svg id="icon-freedom-operate" class="w-6 h-6 text-gray-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="content-freedom-operate" class="hidden px-6 py-5 bg-white border-t border-gray-200">
                            <p class="text-gray-600 text-base leading-relaxed">
                                <strong>Freedom To Operate (FTO)</strong> adalah analisis untuk memastikan bahwa suatu produk atau teknologi tidak melanggar hak paten yang masih berlaku milik pihak lain.
                            </p>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-700 mb-2">Tahapan FTO:</p>
                                <ul class="list-disc list-inside text-gray-600 text-base space-y-1">
                                    <li>Identifikasi teknologi yang akan dikembangkan</li>
                                    <li>Pencarian paten yang relevan</li>
                                    <li>Analisis klaim paten</li>
                                    <li>Evaluasi risiko pelanggaran</li>
                                    <li>Rekomendasi strategi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleAccordion(id) {
    const content = document.getElementById('content-' + id);
    const icon = document.getElementById('icon-' + id);
    
    // Toggle content visibility
    content.classList.toggle('hidden');
    
    // Rotate icon
    if (content.classList.contains('hidden')) {
        icon.style.transform = 'rotate(0deg)';
    } else {
        icon.style.transform = 'rotate(90deg)';
    }
}
</script>
@endpush
@endsection