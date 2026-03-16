<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page KI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

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
            <li><a href="{{ url('/') }}" class="text-red-600 border-b-2 border-red-600 pb-1 font-semibold">Beranda</a></li>
            <li><a href="{{ route('tentang-web') }}" class="hover:text-red-600 transition">Tentang</a></li>
        </ul>
        <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-5 py-2 rounded-lg transition">
            Masuk
        </a>
    </nav>

    <!-- HERO -->
    <section class="relative bg-gray-900 overflow-hidden" style="height: 360px;">

        <!-- Slides -->
        <div class="relative w-full h-full">
            <div class="slide absolute inset-0 transition-opacity duration-500 opacity-100">
                <img src="{{ asset('images/hero1.jpg') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="slide absolute inset-0 transition-opacity duration-500 opacity-0">
                <img src="{{ asset('images/hero2.jpg') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="slide absolute inset-0 transition-opacity duration-500 opacity-0">
                <img src="{{ asset('images/hero3.jpg') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
        </div>

        <!-- Konten -->
        <div class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center px-6">
            <span class="bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wide">Platform</span>
            <h1 class="text-4xl font-extrabold text-white mb-4 leading-tight">
                Sistem Manajemen<br>Kekayaan Intelektual
            </h1>
            <p class="text-white/75 text-base max-w-md mb-8 leading-relaxed">
                Platform digital untuk pengajuan dan pemantauan Kekayaan Intelektual di lingkungan Badan Riset dan Inovasi Nasional.
            </p>
        </div>

        <!-- Dots -->
        <div class="absolute bottom-4 left-0 right-0 z-10 flex justify-center gap-2">
            <button class="dot w-2 h-2 rounded-full bg-white transition-all" data-index="0"></button>
            <button class="dot w-2 h-2 rounded-full bg-white/40 transition-all" data-index="1"></button>
            <button class="dot w-2 h-2 rounded-full bg-white/40 transition-all" data-index="2"></button>
        </div>

    </section>

    <script>
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let current = 0;

        function goTo(n) {
            slides[current].classList.replace('opacity-100', 'opacity-0');
            dots[current].classList.replace('bg-white', 'bg-white/40');

            current = (n + slides.length) % slides.length;

            slides[current].classList.replace('opacity-0', 'opacity-100');
            dots[current].classList.replace('bg-white/40', 'bg-white');
        }

        dots.forEach(dot => dot.addEventListener('click', () => goTo(+dot.dataset.index)));

        setInterval(() => goTo(current + 1), 4000);
    </script>

    <!-- STATS -->
    <section class="bg-red-600 py-0.5 px-0">
        {{-- <div class="max-w-4xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-white">
            <div>
                <p class="text-3xl font-extrabold">5.865</p>
                <p class="text-xs opacity-75 mt-1">Paten</p>
            </div>
            <div>
                <p class="text-3xl font-extrabold">1.187</p>
                <p class="text-xs opacity-75 mt-1">Hak Cipta</p>
            </div>
            <div>
                <p class="text-3xl font-extrabold">377</p>
                <p class="text-xs opacity-75 mt-1">Desain Industri</p>
            </div>
            <div>
                <p class="text-3xl font-extrabold">48</p>
                <p class="text-xs opacity-75 mt-1">PVT</p>
            </div>
        </div> --}}
    </section>

    <!-- PENGUMUMAN TERBARU -->
    <section class="py-16 px-6 bg-gray-50">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 text-center uppercase tracking-wide mb-1">Pengumuman Terbaru</h2>
            {{--<div class="w-12 h-1 bg-red-600 rounded mx-auto mb-10"></div> --}}
            <p class="text-gray-400 text-sm text-center mb-10"></p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-white border border-gray-200 hover:border-gray-300 rounded-xl p-6 flex flex-col gap-3 transition">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-1">Batas Waktu Periode Pengusulan KI</p>
                            <p class="text-xs text-gray-500 leading-relaxed">Sebagaimana diketahui bahwa pelindungan Kekayaan Intelektual (KI) yang difasilitasi Direktorat Manajemen...</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">09 Mar 2026</p>
                    <a href="#" class="text-xs text-blue-600 font-semibold hover:underline w-fit">Lihat Lebih Banyak →</a>
                </div>

                <div class="bg-white border border-gray-200 hover:border-gray-300 rounded-xl p-6 flex flex-col gap-3 transition">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-1">Panduan Pengusulan KI BRIN Tahun 2026</p>
                            <p class="text-xs text-gray-500 leading-relaxed">Sehubungan dengan pelaksanaan proses pengusulan Kekayaan Intelektual (KI) di lingkungan Badan Riset...</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">04 Mar 2026</p>
                    <a href="#" class="text-xs text-blue-600 font-semibold hover:underline w-fit">Lihat Lebih Banyak →</a>
                </div>

                <div class="bg-white border border-gray-200 hover:border-gray-300 rounded-xl p-6 flex flex-col gap-3 transition">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-1">Pengusulan Pendaftaran Paten Internasional</p>
                            <p class="text-xs text-gray-500 leading-relaxed">BRIN lewat Direktorat Manajemen Kekayaan Intelektual (DMKI) membuka pendaftaran paten internasional...</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">04 Mar 2026</p>
                    <a href="#" class="text-xs text-blue-600 font-semibold hover:underline w-fit">Lihat Lebih Banyak →</a>
                </div>

            </div>

            <div class="flex justify-center mt-10">
                <a href="#" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-8 py-3 rounded-full transition">
                    Lihat Semua Pengumuman
                </a>
            </div>
        </div>
    </section>

    <!-- KI TYPES -->
    <section class="py-10 pb-16 px-6 max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Jenis Kekayaan Intelektual</h2>
        <p class="text-gray-400 text-sm text-center mb-10"></p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['📜', 'Paten', '5.865'],
                ['©️', 'Hak Cipta', '1.187'],
                ['®️', 'Merek', '50'],
                ['🎨', 'Desain Industri', '377'],
                ['🌱', 'PVT', '48'],
                ['💡', 'Desain TLST', '4'],
                ['🗺️', 'Indikasi Geografis', '0'],
            ] as [$icon, $name, $count])
            <div class="bg-white border border-gray-200 hover:border-red-400 hover:shadow-md rounded-xl p-5 text-center transition group">
                <div class="text-4xl mb-4">{{ $icon }}</div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-red-600 mb-2">{{ $name }}</p>
                <p class="text-2xl font-bold text-red-600">{{ $count }}</p>
                <p class="text-xs text-gray-400 mt-1">judul</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- <!-- STEPS -->
    <section id="cara-pengajuan" class="bg-white border-t border-gray-100 py-16 px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Cara Pengajuan</h2>
            <p class="text-gray-400 text-sm text-center mb-10">Proses mudah dalam 4 langkah</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach([
                    ['1', 'Login', 'Masuk menggunakan akun BRIN Anda'],
                    ['2', 'Pilih Jenis KI', 'Pilih jenis KI yang sesuai'],
                    ['3', 'Isi Formulir', 'Lengkapi data dan upload dokumen'],
                    ['4', 'Pantau Status', 'Lacak perkembangan pengajuan'],
                ] as [$num, $title, $desc])
                <div>
                    <div class="w-12 h-12 rounded-full bg-red-600 text-white font-bold text-lg flex items-center justify-center mx-auto mb-3">{{ $num }}</div>
                    <p class="font-semibold text-gray-800 text-sm mb-1">{{ $title }}</p>
                    <p class="text-xs text-gray-400 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-gray-400 py-8 px-6 text-center text-xs">
        <p class="text-white font-semibold mb-1">Pencatatan KI</p>
        <p>Sistem Informasi Pencatatan Kekayaan Intelektual</p>
        <p class="mt-2">© {{ date('Y') }} Sistem Pencatatan Kekayaan Intelektual BRIN</p> {{-- Direktorat Manajemen Kekayaan Intelektual — BRIN --}}
        <p class="mt-2">📧 aaa@bbbb.go.id &nbsp;|&nbsp; 🌐 brin.go.id</p>
    </footer>

</body>
</html>