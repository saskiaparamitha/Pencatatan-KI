<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pencatatan KI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #dc2626, #ec4899);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #b91c1c, #db2777);
        }
        
        /* Sidebar animations */
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .sidebar-item:hover {
            transform: translateX(8px);
            background: linear-gradient(90deg, rgba(220, 38, 38, 0.1), transparent);
        }
        
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(220, 38, 38, 0.15), transparent);
            border-right: 3px solid #dc2626;
        }
        
        /* Card hover effects */
        .stat-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #dc2626, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Menu icon animation */
        .menu-icon {
            transition: transform 0.3s ease;
        }
        
        .sidebar-item:hover .menu-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        /* Notification badge pulse */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        .notification-badge {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-xl fixed h-full z-50 overflow-y-auto">
            <!-- Logo/Brand -->
            <div class="p-6 border-b border-gray-100">
                <h1 class="text-2xl font-bold gradient-text">Pencatatan KI</h1>
                <p class="text-xs text-gray-500 mt-1 capitalize">{{ Auth::user()->role }} Dashboard</p>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="p-4 space-y-1">
                <!-- Beranda -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-lg">
                    <svg class="menu-icon w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium text-gray-700">Beranda</span>
                </a>
                
                <!-- Data KI (PARENT dengan Toggle) -->
                <div id="dataKiToggle" class="sidebar-item flex items-center justify-between px-4 py-3 rounded-lg cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="menu-icon w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="font-medium text-gray-700">Data KI</span>
                    </div>
                    <svg id="dataKiArrow" class="w-4 h-4 text-gray-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                <!-- SUBMENU Data KI (Dynamic berdasarkan role) -->
                <div id="dataKiMenu" class="ml-6 space-y-1 hidden">
                    <a href="{{ route(Auth::user()->role . '.paten') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="text-gray-600">Paten</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.hak-cipta') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                        <span class="text-gray-600">Hak Cipta</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.merek') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span class="text-gray-600">Merek</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.desain-industri') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                        <span class="text-gray-600">Desain Industri</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.varietas-tanaman') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <span class="text-gray-600">Varietas Tanaman</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.desain-sirkuit') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="text-gray-600">Desain Sirkuit</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.indikasi-geografis') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-gray-600">Indikasi Geografis</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-40">
                <div class="flex items-center justify-between px-8 py-4">
                    <!-- Search Bar -->
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <input 
                                type="text" 
                                placeholder="Search Bar" 
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            />
                            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- User Info -->
                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-red-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="notification-badge absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- User Profile -->
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-700">Halo, {{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-pink-500 flex items-center justify-center text-white font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>

                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="ml-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">
                <div class="space-y-8">
                    <!-- Page Header -->
                    <div>
                        <h1 class="text-3xl font-bold gradient-text mb-2">Dashboard {{ ucfirst(Auth::user()->role) }}</h1>
                        <p class="text-gray-600">Selamat datang di sistem pencatatan kekayaan intelektual</p>
                    </div>

                    <!-- Statistics Cards -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Rekap Status Pengajuan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Card 1 -->
                            <div class="stat-card bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="p-3 bg-gradient-to-br from-green-100 to-green-50 rounded-xl">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">+12%</span>
                                </div>
                                <h3 class="text-gray-600 text-sm font-medium mb-1">
                                    @if(Auth::user()->role === 'verifikator')
                                        Terverifikasi
                                    @else
                                        Disetujui
                                    @endif
                                </h3>
                                    <p class="text-4xl font-bold text-gray-800 mb-2">{{ $verifiedCount }}</p>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                    <span>Bulan ini</span>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="stat-card bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="p-3 bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-xl">
                                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Pending</span>
                                </div>
                                <h3 class="text-gray-600 text-sm font-medium mb-1">
                                    @if(Auth::user()->role === 'verifikator')
                                        Menunggu Verifikasi
                                    @else
                                        Menunggu Review
                                    @endif
                                </h3>
                                <p class="text-4xl font-bold text-gray-800 mb-2">{{ $pendingCount }}</p>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Dalam antrian</span>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="stat-card bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="p-3 bg-gradient-to-br from-red-100 to-red-50 rounded-xl">
                                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">-5%</span>
                                </div>
                                <h3 class="text-gray-600 text-sm font-medium mb-1">Ditolak</h3>
                                <p class="text-4xl font-bold text-gray-800 mb-2">{{ $rejectedCount }}</p>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                                    </svg>
                                    <span>Bulan ini</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Statistik Kekayaan Intelektual</h2>
                            <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 text-sm">
                                <option>Tahun</option>
                                <option>2024</option>
                                <option>2023</option>
                                <option>2022</option>
                            </select>
                        </div>
                        
                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                            <canvas id="statisticsChart" class="w-full" style="height: 400px;"></canvas>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h2>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="divide-y divide-gray-100">
                            @forelse($activities as $item)
                            <div class="p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-pink-500 flex items-center justify-center text-white font-bold">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>

                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-800">
                                            Pengajuan {{ $item->usulan->mstKi->nama }} diproses
                                        </p>
                                        <p class="text-xs text-gray-500 mt-0.5">
                                            {{ $item->usulan->judul }}
                                        </p>
                                    </div>

                                    <span class="text-xs text-gray-400">
                                        {{ $item->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            @empty
                            <p class="p-4 text-sm text-gray-500">Belum ada aktivitas</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('statisticsChart').getContext('2d');

        const patenData = @json(array_values($chartPaten->toArray()));
        const hakCiptaData = @json(array_values($chartHakCipta->toArray()));

        const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, 'rgba(220, 38, 38, 0.8)');
        gradient1.addColorStop(1, 'rgba(220, 38, 38, 0.1)');

        const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgba(236, 72, 153, 0.8)');
        gradient2.addColorStop(1, 'rgba(236, 72, 153, 0.1)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ago', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Paten',
                    data: patenData, // ✅ DARI DB
                    borderColor: '#dc2626',
                    backgroundColor: gradient1,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#dc2626',
                    pointBorderWidth: 3,
                    pointHoverRadius: 8
                }, {
                    label: 'Hak Cipta',
                    data: hakCiptaData, // ✅ DARI DB
                    borderColor: '#ec4899',
                    backgroundColor: gradient2,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#ec4899',
                    pointBorderWidth: 3,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 13,
                                family: "'Plus Jakarta Sans', sans-serif",
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14,
                            family: "'Plus Jakarta Sans', sans-serif"
                        },
                        bodyFont: {
                            size: 13,
                            family: "'Plus Jakarta Sans', sans-serif"
                        },
                        cornerRadius: 8,
                        displayColors: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                family: "'Plus Jakarta Sans', sans-serif"
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                family: "'Plus Jakarta Sans', sans-serif"
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    });

    // Toggle dropdown menu Data KI
    document.getElementById('dataKiToggle').addEventListener('click', function() {
        const menu = document.getElementById('dataKiMenu');
        const arrow = document.getElementById('dataKiArrow');
        
        menu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    });
    </script>
</body>
</html>