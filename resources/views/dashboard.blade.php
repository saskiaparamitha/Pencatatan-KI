<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pencatatan KI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-teal-50 to-cyan-100 min-h-screen">
    <!-- Header -->
    <header class="bg-teal-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div>
                    @if(auth()->user()->role === 'user')
                        <h1 class="text-2xl font-bold">Dashboard User (Pengusul)</h1>
                        <p class="text-teal-100 text-sm mt-1">Sistem Pencatatan Kekayaan Intelektual</p>
                    @elseif(auth()->user()->role === 'verifikator')
                        <h1 class="text-2xl font-bold">Dashboard Admin Verifikator</h1>
                        <p class="text-teal-100 text-sm mt-1">Panel Verifikasi Kekayaan Intelektual</p>
                    @elseif(auth()->user()->role === 'reviewer')
                        <h1 class="text-2xl font-bold">Dashboard Admin Reviewer</h1>
                        <p class="text-teal-100 text-sm mt-1">Panel Review Kekayaan Intelektual</p>
                    @endif
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-teal-200">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
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
        @if(auth()->user()->role === 'user')
            <!-- Konten untuk User -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ajukan KI Baru</h3>
                    <p class="text-gray-600 mb-4">Buat pengajuan baru untuk kekayaan intelektual Anda.</p>
                    <button class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700 transition duration-200">
                        Ajukan Sekarang
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Status Pengajuan</h3>
                    <p class="text-gray-600 mb-4">Lihat status pengajuan KI Anda.</p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Lihat Status
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Riwayat KI</h3>
                    <p class="text-gray-600 mb-4">Lihat semua KI yang telah Anda ajukan.</p>
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        Lihat Riwayat
                    </button>
                </div>
            </div>
        @elseif(auth()->user()->role === 'verifikator')
            <!-- Konten untuk Verifikator -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Verifikasi Pengajuan</h3>
                    <p class="text-gray-600 mb-4">Periksa dan verifikasi pengajuan KI yang masuk.</p>
                    <a href="{{ route('admin.verifikator') }}" class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition duration-200 inline-block">
                        Verifikasi
                    </a>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Laporan Verifikasi</h3>
                    <p class="text-gray-600 mb-4">Lihat laporan verifikasi yang telah dilakukan.</p>
                    <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
                        Lihat Laporan
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik</h3>
                    <p class="text-gray-600 mb-4">Lihat statistik verifikasi KI.</p>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                        Lihat Statistik
                    </button>
                </div>
            </div>
        @elseif(auth()->user()->role === 'reviewer')
            <!-- Konten untuk Reviewer -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Review Pengajuan</h3>
                    <p class="text-gray-600 mb-4">Review pengajuan KI yang telah diverifikasi.</p>
                    <a href="{{ route('admin.reviewer') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200 inline-block">
                        Review
                    </a>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Laporan Review</h3>
                    <p class="text-gray-600 mb-4">Lihat laporan review yang telah dilakukan.</p>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition duration-200">
                        Lihat Laporan
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Rekomendasi</h3>
                    <p class="text-gray-600 mb-4">Berikan rekomendasi untuk pengajuan KI.</p>
                    <button class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition duration-200">
                        Rekomendasikan
                    </button>
                </div>
            </div>
        @endif

        <!-- Footer -->
        <footer class="mt-12 text-center text-gray-600">
            <p>&copy; 2026 Sistem Pencatatan Kekayaan Intelektual. All rights reserved.</p>
        </footer>
    </main>
</body>
</html>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Tabs Navigation -->
        <div class="bg-white rounded-t-xl shadow-md">
            <nav class="flex border-b">
                <button class="px-6 py-4 font-semibold text-teal-600 border-b-2 border-teal-600 hover:bg-teal-50 transition">
                    Nama Aplikasi
                </button>
                <button class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition">
                    Beranda
                </button>
                <button class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition">
                    Pengajuan
                </button>
                <button class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition">
                    Panduan
                </button>
                <button class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition">
                    Halo, Pengguna
                </button>
            </nav>
        </div>

        <!-- Dashboard Cards -->
        <div class="bg-white rounded-b-xl shadow-md p-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Pengajuan</h2>

            <!-- First Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Paten Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">📜</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Paten</h3>
                </a>

                <!-- Hak Cipta Card (Active/Selected) -->
                <a href="#" class="group bg-gradient-to-br from-teal-400 to-teal-500 rounded-xl p-8 text-center transition duration-300 shadow-lg hover:shadow-2xl transform hover:scale-105 border-2 border-teal-600">
                    <div class="text-5xl mb-4">©️</div>
                    <h3 class="text-lg font-semibold text-white">Hak Cipta</h3>
                </a>

                <!-- PVT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">🌱</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">PVT</h3>
                </a>
            </div>

            <!-- Second Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Merek Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">®️</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Merek</h3>
                </a>

                <!-- Desain Industri Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">🎨</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Desain Industri</h3>
                </a>

                <!-- Desain TSLT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">💡</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Desain TSLT</h3>
                </a>
            </div>

            <!-- Third Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Indikasi Geografis Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">🗺️</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Indikasi Geografis</h3>
                </a>

                <!-- Jajaran IP-PORT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">🏢</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">Jajaran IP-PORT</h3>
                </a>

                <!-- FTO Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-teal-50 hover:to-teal-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-teal-300">
                    <div class="text-5xl mb-4">🔍</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-700">FTO</h3>
                </a>
            </div>
        </div>

        <!-- Statistics Section (Optional) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Pengajuan</p>
                        <p class="text-3xl font-bold text-teal-600 mt-2">24</p>
                    </div>
                    <div class="bg-teal-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Disetujui</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">18</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Dalam Proses</p>
                        <p class="text-3xl font-bold text-yellow-600 mt-2">5</p>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Ditolak</p>
                        <p class="text-3xl font-bold text-red-600 mt-2">1</p>
                    </div>
                    <div class="bg-red-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-teal-800 text-white mt-16">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center">
                <p class="text-sm">&copy; 2025 Sistem Pencatatan Kekayaan Intelektual. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>