<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pencatatan KI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="{{ route('user.dashboard') }}" class="px-6 py-4 font-semibold text-red-600 border-b-2 border-red-600 transition">
                    Dashboard
                </a>
                <a href="{{ route('user.pengajuan') }}" class="px-6 py-4 font-medium text-gray-600 hover:bg-gray-50 hover:text-red-600 transition">
                    Pengajuan
                </a>
                <a href="{{ route('user.panduan') }}" class="px-6 py-4 font-semibold text-gray-600 hover:bg-gray-50 hover:text-red-600 transition">
                    Panduan
                </a>
            </nav>
        </div>

        <!-- Dashboard Content -->
        <div class="bg-white rounded-b-xl shadow-md p-8">
            <!-- Total Pengajuan -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Total Pengajuan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-300 rounded-xl p-8 text-center hover:shadow-lg transition">
                        <div class="text-4xl mb-2">✅</div>
                        <p class="text-4xl font-bold text-green-700 mb-2">18</p>
                        <p class="text-gray-700 font-semibold">Disetujui</p>
                    </div>
                    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 border-2 border-yellow-300 rounded-xl p-8 text-center hover:shadow-lg transition">
                        <div class="text-4xl mb-2">⏳</div>
                        <p class="text-4xl font-bold text-yellow-700 mb-2">5</p>
                        <p class="text-gray-700 font-semibold">Diproses</p>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-8 text-center hover:shadow-lg transition">
                        <div class="text-4xl mb-2">❌</div>
                        <p class="text-4xl font-bold text-red-700 mb-2">2</p>
                        <p class="text-gray-700 font-semibold">Ditolak</p>
                    </div>
                </div>
            </div>

            <!-- Status Terbaru -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Status Terbaru</h2>
                    <a href="#" class="text-sm text-red-600 hover:text-red-700 font-medium flex items-center gap-1">
                        Lihat Semua 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-100 border-2 border-gray-300 rounded-xl p-16 hover:shadow-lg transition"></div>
                    <div class="bg-gray-100 border-2 border-gray-300 rounded-xl p-16 hover:shadow-lg transition"></div>
                    <div class="bg-gray-100 border-2 border-gray-300 rounded-xl p-16 hover:shadow-lg transition"></div>
                </div>
            </div>

            <!-- Informasi Penting -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Informasi Penting</h2>
                    <a href="#" class="text-sm text-red-600 hover:text-red-700 font-medium flex items-center gap-1">
                        Lihat Semua 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 border-2 border-blue-300 rounded-xl p-12 flex flex-col items-center justify-center hover:shadow-lg transition">
                        <div class="text-4xl mb-3">📢</div>
                        <p class="text-gray-700 font-semibold">Pengumuman</p>
                    </div>
                    <div class="bg-blue-50 border-2 border-blue-300 rounded-xl p-12 flex flex-col items-center justify-center hover:shadow-lg transition">
                        <div class="text-4xl mb-3">📢</div>
                        <p class="text-gray-700 font-semibold">Pengumuman</p>
                    </div>
                    <div class="bg-blue-50 border-2 border-blue-300 rounded-xl p-12 flex flex-col items-center justify-center hover:shadow-lg transition">
                        <div class="text-4xl mb-3">📢</div>
                        <p class="text-gray-700 font-semibold">Pengumuman</p>
                    </div>
                </div>
            </div>

            <!-- Grafik Statistik -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistik Pengajuan</h2>
                <div class="bg-white border-2 border-gray-300 rounded-xl p-6">
                    <canvas id="statistikChart"></canvas>
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
        // Chart.js - Grafik Statistik
        const ctx = document.getElementById('statistikChart').getContext('2d');
        const statistikChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Paten', 'Hak Cipta', 'Merek', 'Desain Industri', 'PVT', 'Desain TSLT', 'Indikasi Geografis', 'IP-PORT', 'FTO'],
                datasets: [{
                    label: 'Disetujui',
                    data: [5, 8, 3, 2, 4, 1, 3, 2, 1],
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Diproses',
                    data: [2, 1, 3, 1, 2, 0, 1, 1, 0],
                    backgroundColor: 'rgba(234, 179, 8, 0.8)',
                    borderColor: 'rgba(234, 179, 8, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Ditolak',
                    data: [1, 0, 1, 0, 0, 0, 0, 0, 0],
                    backgroundColor: 'rgba(239, 68, 68, 0.8)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Statistik Pengajuan per Kategori'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>