<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan - Pencatatan KI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
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
                    Dashboard
                </a>
                <a href="{{ route('user.pengajuan') }}" class="px-6 py-4 font-medium text-red-600 border-b-2 border-red-600 transition">
                    Pengajuan
                </a>
                <a href="{{ route('user.panduan') }}" class="px-6 py-4 font-semibold text-gray-600 hover:bg-gray-50 hover:text-red-600 transition">
                    Panduan
                </a>
            </nav>
        </div>

        <!-- Dashboard Cards -->
        <div class="bg-white rounded-b-xl shadow-md p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Pilih Jenis Pengajuan</h2>
                <a href="{{ route('user.panduan') }}" class="text-sm text-red-600 hover:text-red-700 font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Butuh bantuan? Lihat Panduan
                </a>
            </div>

            <!-- First Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Paten Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">📜</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Paten</h3>
                </a>

                <!-- Hak Cipta Card (Active/Selected) -->
                <a href="#" class="group bg-gradient-to-br from-red-400 to-red-500 rounded-xl p-8 text-center transition duration-300 shadow-lg hover:shadow-2xl transform hover:scale-105 border-2 border-red-600">
                    <div class="text-5xl mb-4">©️</div>
                    <h3 class="text-lg font-semibold text-white">Hak Cipta</h3>
                </a>

                <!-- PVT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">🌱</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">PVT</h3>
                </a>
            </div>

            <!-- Second Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Merek Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">®️</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Merek</h3>
                </a>

                <!-- Desain Industri Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">🎨</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Desain Industri</h3>
                </a>

                <!-- Desain TSLT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">💡</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Desain TSLT</h3>
                </a>
            </div>

            <!-- Third Row - 3 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Indikasi Geografis Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">🗺️</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Indikasi Geografis</h3>
                </a>

                <!-- Jajaran IP-PORT Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">🏢</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">Jajaran IP-PORT</h3>
                </a>

                <!-- FTO Card -->
                <a href="#" class="group bg-gradient-to-br from-gray-100 to-gray-200 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition duration-300 shadow-sm hover:shadow-xl border-2 border-transparent hover:border-red-300">
                    <div class="text-5xl mb-4">🔍</div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700">FTO</h3>
                </a>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Pengajuan</p>
                        <p class="text-3xl font-bold text-red-600 mt-2">24</p>
                    </div>
                    <div class="bg-red-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <footer class="bg-red-800 text-white mt-16">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center">
                <p class="text-sm">&copy; 2026 Sistem Pencatatan Kekayaan Intelektual. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>