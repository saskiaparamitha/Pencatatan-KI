<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan - Pencatatan KI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .menu-item {
            cursor: pointer;
            user-select: none;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .accordion-content.active {
            max-height: 1000px;
            transition: max-height 0.5s ease-in;
        }
        .arrow {
            transition: transform 0.3s ease;
        }
        .arrow.rotate {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 to-cyan-100 min-h-screen">
    <!-- Header -->
    <header class="bg-red-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Pencatatan KI</h1>
                    <p class="text-red-100 text-sm mt-1">Sistem Pencatatan Kekayaan Intelektual</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-red-200">{{ Auth::user()->email }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-lg transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Tabs Navigation -->
        <div class="bg-white rounded-t-xl shadow-md">
            <nav class="flex border-b">
                <a href="{{ route('user.dashboard') }}" class="px-6 py-4 font-semibold text-gray-600 hover:bg-gray-50 hover:text-red-600 transition">
                    Beranda
                </a>
                <a href="{{ route('user.pengajuan') }}" class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-red-600 transition">
                    Pengajuan
                </a>
                <a href="{{ route('user.panduan') }}" class="px-6 py-4 font-semibold text-red-600 border-b-2 border-red-600 transition">
                    Panduan
                </a>
            </nav>
        </div>

        <!-- Panduan Content -->
        <div class="bg-white rounded-b-xl shadow-md p-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Panduan Pengajuan Kekayaan Intelektual</h2>

            <!-- Menu List with Accordion -->
            <div class="space-y-3">
                <!-- Paten -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">📜</span>
                            <span class="text-gray-700 font-semibold">Paten</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                <li>• Formulir permohonan paten yang telah diisi</li>
                                <li>• Deskripsi lengkap tentang invensi</li>
                                <li>• Klaim paten</li>
                                <li>• Abstrak invensi</li>
                                <li>• Gambar teknis (jika diperlukan)</li>
                                <li>• Surat kuasa (jika diajukan melalui konsultan)</li>
                            </ul>
                            <h4 class="font-semibold text-gray-800 mb-2">Langkah Pengajuan:</h4>
                            <ol class="text-sm text-gray-600 space-y-2">
                                <li>1. Siapkan semua dokumen persyaratan</li>
                                <li>2. Klik menu "Pengajuan" dan pilih "Paten"</li>
                                <li>3. Isi formulir dengan lengkap dan benar</li>
                                <li>4. Upload dokumen pendukung</li>
                                <li>5. Review dan submit permohonan</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Hak Cipta -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">©️</span>
                            <span class="text-gray-700 font-semibold">Hak Cipta</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                <li>• Formulir pendaftaran hak cipta</li>
                                <li>• Contoh karya cipta (softcopy/hardcopy)</li>
                                <li>• Surat pernyataan kepemilikan</li>
                                <li>• KTP pencipta</li>
                                <li>• Surat kuasa (jika diwakilkan)</li>
                            </ul>
                            <h4 class="font-semibold text-gray-800 mb-2">Jenis Karya yang Dilindungi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Buku, program komputer, pamflet</li>
                                <li>• Lagu atau musik dengan atau tanpa teks</li>
                                <li>• Drama, tari, pewayangan, pantomim</li>
                                <li>• Karya seni rupa (lukisan, patung, dll)</li>
                                <li>• Karya arsitektur</li>
                                <li>• Peta, karya fotografi, sinematografi</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Merek -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">®️</span>
                            <span class="text-gray-700 font-semibold">Merek</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                <li>• Formulir permohonan merek</li>
                                <li>• Label merek (ukuran 9x9 cm, 10 lembar)</li>
                                <li>• Daftar jenis barang/jasa</li>
                                <li>• KTP pemohon</li>
                                <li>• Akta pendirian perusahaan (untuk badan hukum)</li>
                                <li>• Surat pernyataan kepemilikan merek</li>
                            </ul>
                            <h4 class="font-semibold text-gray-800 mb-2">Tips Penting:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Pastikan merek belum terdaftar sebelumnya</li>
                                <li>• Pilih kelas barang/jasa dengan tepat</li>
                                <li>• Merek harus memiliki daya pembeda</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Desain Industri -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🎨</span>
                            <span class="text-gray-700 font-semibold">Desain Industri</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li>• Formulir permohonan desain industri</li>
                                <li>• Gambar atau foto desain (6 perspektif)</li>
                                <li>• Uraian desain industri</li>
                                <li>• Surat pernyataan kepemilikan</li>
                                <li>• KTP pendesain</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Varietas Tanaman -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🌱</span>
                            <span class="text-gray-700 font-semibold">Varietas Tanaman (PVT)</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li>• Formulir permohonan PVT</li>
                                <li>• Deskripsi varietas tanaman</li>
                                <li>• Hasil uji karakteristik (DUS Test)</li>
                                <li>• Foto/gambar tanaman</li>
                                <li>• Surat pernyataan pemulia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Desain Sirkuit -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">💡</span>
                            <span class="text-gray-700 font-semibold">Desain Sirkuit Terpadu (TSLT)</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li>• Formulir permohonan TSLT</li>
                                <li>• Gambar/foto desain tata letak</li>
                                <li>• Data teknis sirkuit terpadu</li>
                                <li>• Uraian cara kerja rangkaian</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Indikasi Geografis -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🗺️</span>
                            <span class="text-gray-700 font-semibold">Indikasi Geografis</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Dokumen:</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li>• Formulir permohonan indikasi geografis</li>
                                <li>• Buku persyaratan (dokumen deskripsi)</li>
                                <li>• Bukti reputasi produk</li>
                                <li>• Peta wilayah geografis</li>
                                <li>• Surat pernyataan pemohon</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Jajaran IP-PORT -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🏢</span>
                            <span class="text-gray-700 font-semibold">Jajaran IP-PORT</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <p class="text-sm text-gray-600 mb-3">
                                IP-PORT (Intellectual Property Portfolio) adalah sistem manajemen portofolio kekayaan intelektual yang membantu melacak dan mengelola aset KI.
                            </p>
                            <h4 class="font-semibold text-gray-800 mb-2">Fitur:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Tracking status pengajuan</li>
                                <li>• Monitoring masa berlaku</li>
                                <li>• Laporan portofolio KI</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Freedom To Operate -->
                <div class="bg-gray-100 rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div class="menu-item hover:bg-gray-200 transition px-6 py-4 flex justify-between items-center" onclick="toggleAccordion(this)">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🔍</span>
                            <span class="text-gray-700 font-semibold">Freedom to Operate (FTO)</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="accordion-content">
                        <div class="px-6 py-4 bg-white border-t-2 border-gray-200">
                            <p class="text-sm text-gray-600 mb-3">
                                FTO adalah analisis untuk memastikan produk/teknologi tidak melanggar hak paten yang sudah ada.
                            </p>
                            <h4 class="font-semibold text-gray-800 mb-2">Langkah FTO:</h4>
                            <ol class="text-sm text-gray-600 space-y-2">
                                <li>1. Identifikasi teknologi yang akan dikomersialisasi</li>
                                <li>2. Lakukan pencarian paten terkait</li>
                                <li>3. Analisis klaim paten yang relevan</li>
                                <li>4. Evaluasi risiko pelanggaran</li>
                                <li>5. Buat rekomendasi strategi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-6 mt-8">
                <div class="flex items-start">
                    <div class="text-3xl mr-4">💡</div>
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-900 mb-2">Tips Pengajuan</h3>
                        <ul class="text-sm text-yellow-800 space-y-2">
                            <li>• Pastikan semua dokumen persyaratan sudah lengkap dan sesuai format</li>
                            <li>• Periksa kembali data yang diinput sebelum submit pengajuan</li>
                            <li>• Simpan nomor registrasi untuk tracking status pengajuan</li>
                            <li>• Hubungi admin jika membutuhkan bantuan lebih lanjut</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-800 text-white mt-16">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center">
                <p class="text-sm">&copy; 2026 Sistem Pencatatan Kekayaan Intelektual. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleAccordion(element) {
            // Get the accordion content (next sibling)
            const content = element.nextElementSibling;
            const arrow = element.querySelector('.arrow');
            
            // Close all other accordions
            document.querySelectorAll('.accordion-content').forEach(item => {
                if (item !== content && item.classList.contains('active')) {
                    item.classList.remove('active');
                }
            });
            
            // Reset all arrows
            document.querySelectorAll('.arrow').forEach(item => {
                if (item !== arrow && item.classList.contains('rotate')) {
                    item.classList.remove('rotate');
                }
            });
            
            // Toggle current accordion
            content.classList.toggle('active');
            arrow.classList.toggle('rotate');
        }
    </script>
</body>
</html>