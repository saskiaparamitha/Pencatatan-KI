<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-50">
        <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
            <div class="w-9 h-9 bg-red-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                ID
            </div>
            <div>
                <p class="font-bold text-gray-800 leading-tight group-hover:text-black-600 transition">
                    Pencatatan KI
                </p>
                <p class="text-xs text-gray-400">Landing Page</p>
            </div>
        </a>
        <ul class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:text-red-600 transition">Beranda</a></li>
            <li><a href="{{ route('tentang-web') }}" class="text-red-600 border-b-2 border-red-600 pb-1 font-semibold"">Tentang</a></li>
        </ul>
        <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-5 py-2 rounded-lg transition">
            Masuk
        </a>
    </nav>

    <!-- HEADER -->
    <section class="bg-white py-14 px-6 text-center border-b border-gray-100">
        <span class="inline-block bg-red-50 text-red-600 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wide">Panduan</span>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Tentang Website</h1>
        <p class="text-gray-400 text-sm max-w-md mx-auto">Deskripsi mengenai macam-macam Kekayaan Intelektual</p>
    </section>

    <section class="bg-red-600 py-0.5 px-0">
    </section>
    
    <!-- STEPS -->
    <section class="py-16 px-6 max-w-6xl mx-auto flex-1">
        <div class="flex flex-col gap-4">
            @foreach([
                ['1', 'Paten', 'Paten adalah hak eksklusif yang diberikan oleh negara kepada inventor atas hasil invensinya di bidang teknologi. Paten memberikan hak kepada pemegangnya untuk menggunakan invensi tersebut selama jangka waktu tertentu.', ''],
                ['2', 'Hak Cipta', 'Hak Cipta adalah hak eksklusif pencipta yang timbul secara otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk nyata tanpa mengurangi pembatasan sesuai dengan ketentuan peraturan perundang-undangan.', ''],
                ['3', 'PVT', 'Perlindungan Varietas Tanaman (PVT) adalah perlindungan khusus yang diberikan negara kepada varietas tanaman yang dihasilkan oleh pemulia tanaman melalui kegiatan pemuliaan tanaman.', ''],
                ['4', 'Merek', 'Merek adalah tanda yang dapat ditampilkan secara grafis berupa gambar, logo, nama, kata, huruf, angka, susunan warna, dalam bentuk 2 dimensi dan/atau 3 dimensi, suara, hologram, atau kombinasi dari 2 atau lebih unsur tersebut untuk membedakan barang dan/atau jasa yang diproduksi.', ''],
                ['5', 'Desain Industri', 'Desain Industri adalah suatu kreasi tentang bentuk, konfigurasi atau komposisi garis atau warna, atau garis dan warna, atau gabungan daripadanya yang berbentuk tiga dimensi atau dua dimensi yang memberikan kesan estetis dan dapat diwujudkan dalam pola tiga dimensi atau dua dimensi serta dapat dipakai untuk menghasilkan suatu produk.', ''],
                ['6', 'Desain TLST', 'Desain Tata Letak Sirkuit Terpadu (TLST) adalah kreasi berupa rancangan peletakan tiga dimensi dari berbagai elemen, sekurang-kurangnya satu dari elemen tersebut adalah elemen aktif, serta sebagian atau semua interkoneksi dalam suatu sirkuit terpadu.', ''],
                ['7', 'Indikasi Geografis', 'Indikasi Geografis adalah suatu tanda yang menunjukkan daerah asal suatu barang dan/atau produk yang karena faktor lingkungan geografis termasuk faktor alam, faktor manusia atau kombinasi dari kedua faktor tersebut memberikan reputasi, kualitas, dan karakteristik tertentu pada barang dan/atau produk yang dihasilkan.', ''],
            ] as [$num, $title, $desc, $icon])
            <div class="bg-white border border-gray-200 rounded-xl p-6 flex items-start gap-5 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-full bg-red-600 text-white font-bold text-lg flex items-center justify-center shrink-0">
                    {{ $num }}
                </div>
                <div>
                    <p class="text-lg font-semibold text-gray-800 mb-1">{{ $icon }} {{ $title }}</p>
                    <p class="text-sm text-gray-400 leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-gray-400 py-8 px-6 text-center text-xs">
        <p class="text-white font-semibold mb-1">Pencatatan KI</p>
        <p>Sistem Informasi Pencatatan Kekayaan Intelektual</p>
        <p class="mt-2">© {{ date('Y') }} Sistem Pencatatan Kekayaan Intelektual BRIN</p> {{-- Direktorat Manajemen Kekayaan Intelektual — BRIN --}}
        <p class="mt-2">📧 aaa@bbbb.go.id &nbsp;|&nbsp; 🌐 brin.go.id</p>
    </footer>

</body>
</html>