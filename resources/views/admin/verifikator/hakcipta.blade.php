<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verifikasi Hak Cipta - Pencatatan KI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
        
        /* Menu icon animation */
        .menu-icon {
            transition: transform 0.3s ease;
        }
        
        .sidebar-item:hover .menu-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Badge styles */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
        }
        
        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s;
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: #fefefe;
            padding: 0;
            border-radius: 1rem;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow: hidden;
            animation: slideUp 0.3s;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Table hover effect */
        tbody tr {
            transition: all 0.2s ease;
        }
        
        tbody tr:hover {
            background-color: #fef2f2;
            transform: scale(1.01);
        }

        /* Stat card hover */
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* SweetAlert2 Custom Styles */
        .swal2-popup {
            border-radius: 1rem;
        }
        
        .swal2-textarea {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.75rem;
        }
        
        .swal2-textarea:focus {
            border-color: #dc2626;
            outline: none;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        /* Tab Navigation Styles */
        .tab-button {
            padding: 1rem 1.5rem;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 500;
            color: #6b7280;
            background: transparent;
        }
        
        .tab-button:hover {
            color: #dc2626;
            background-color: #fef2f2;
        }
        
        .tab-button.active {
            color: #dc2626;
            border-bottom-color: #dc2626;
            background-color: #fef2f2;
        }
        
        .tab-content {
            display: none;
            padding: 2rem;
            max-height: 55vh;
            overflow-y: auto;
        }
        
        .tab-content.active {
            display: block;
            animation: fadeInTab 0.3s;
        }
        
        @keyframes fadeInTab {
            from { opacity: 0; transform: translateX(10px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        /* Document Item */
        .doc-item {
            transition: all 0.2s ease;
        }
        
        .doc-item:hover {
            background-color: #f3f4f6 !important;
            transform: translateX(5px);
        }
        
        /* Kolaborator Item */
        .kolaborator-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        
        .kolaborator-item:hover {
            border-left-color: #dc2626;
            background-color: #fef2f2 !important;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-xl fixed h-full z-50 overflow-y-auto">
            <!-- Logo/Brand -->
            <div class="p-6 border-b border-gray-100">
                <h1 class="text-2xl font-bold text-red-600">Pencatatan KI</h1>
                <p class="text-xs text-gray-500 mt-1">Verifikator Dashboard</p>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="p-4 space-y-1">
                <!-- Beranda -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg">
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

                <!-- SUBMENU Data KI -->
                <div id="dataKiMenu" class="ml-6 space-y-1 hidden">
                    <a href="{{ route(Auth::user()->role . '.paten') }}" class="sidebar-item flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="text-gray-600">Paten</span>
                    </a>
                    
                    <a href="{{ route(Auth::user()->role . '.hak-cipta') }}" class="sidebar-item active flex items-center gap-3 px-4 py-2 rounded-lg text-sm">
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
                                placeholder="Cari pengajuan paten..." 
                                id="searchInput"
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
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- User Profile -->
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-700">Halo, Verifikator</p>
                                <p class="text-xs text-gray-500">Verifikator</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-pink-500 flex items-center justify-center text-white font-bold">
                                V
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
                <div class="space-y-6">
                    <!-- Page Header -->
                    <div>
                        <h1 class="text-3xl font-bold text-red-600 mb-2">Verifikasi Hak Cipta</h1>
                        <p class="text-gray-600">Kelola dan verifikasi pengajuan hak cipta, serta assign ke reviewer</p>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <!-- Total -->
                        <div class="stat-card bg-white rounded-xl p-6 shadow-md border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium mb-1">Total Pengajuan</p>
                                    <p class="text-3xl font-bold text-gray-800">{{ $total }}</p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Menunggu Verifikasi -->
                        <div class="stat-card bg-white rounded-xl p-6 shadow-md border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium mb-1">Menunggu Verifikasi</p>
                                    <p class="text-3xl font-bold text-yellow-600">{{ $menunggu }}</p>
                                </div>
                                <div class="p-3 bg-yellow-100 rounded-lg">
                                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Terverifikasi -->
                        <div class="stat-card bg-white rounded-xl p-6 shadow-md border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium mb-1">Terverifikasi</p>
                                    <p class="text-3xl font-bold text-green-600">{{ $terverifikasi }}</p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-lg">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Ditolak -->
                        <div class="stat-card bg-white rounded-xl p-6 shadow-md border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium mb-1">Ditolak</p>
                                    <p class="text-3xl font-bold text-red-600">{{ $ditolak }}</p>
                                </div>
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="bg-white rounded-xl p-4 shadow-md border border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-700 mb-2 block">Filter Status</label>
                                <select id="filterStatus" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    <option value="">Semua Status</option>
                                    <option value="menunggu">Menunggu Verifikasi</option>
                                    <option value="terverifikasi">Terverifikasi</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <label class="text-sm font-medium text-gray-700 mb-2 block">Urutkan</label>
                                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    <option>Terbaru</option>
                                    <option>Terlama</option>
                                    <option>Nama A-Z</option>
                                    <option>Nama Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gradient-to-r from-red-600 to-pink-600 text-white">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">Judul Hak Cipta</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">Pemohon</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal Pengajuan</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold">Reviewer</th>
                                        <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100" id="tableBody">
@forelse ($data as $index => $item)
<tr
    data-status="
        @if(optional($item->verifikasi)->titik_proses == 2) menunggu
        @elseif(optional($item->verifikasi)->titik_proses == 3) terverifikasi
        @else ditolak
        @endif
    "
>
    <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>

    <td class="px-6 py-4 text-sm font-medium text-gray-800">
        {{ $item->judul }}
    </td>

    <td class="px-6 py-4 text-sm text-gray-700">
        {{ $item->user->username ?? '-' }}
    </td>

    <td class="px-6 py-4 text-sm text-gray-700">
        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
    </td>

    <td class="px-6 py-4">
    @if(optional($item->verifikasi)->titik_proses == 3)
        <span class="badge badge-success">Terverifikasi</span>
    @elseif(optional($item->verifikasi)->titik_proses == 4)
        <span class="badge badge-danger">Ditolak</span>
    @else
        <span class="badge badge-warning">Menunggu Verifikasi</span>
@endif
    </td>

    <td class="px-6 py-4">
        @if(optional($item->verifikasi)->titik_proses == 2)
            <select class="reviewer-select px-3 py-1 text-sm border rounded-lg">
                <option value="">Pilih Reviewer</option>
                @foreach ($reviewers as $reviewer)
                    <option value="{{ $reviewer->user_id }}">
                        {{ $reviewer->username }}
                    </option>
                @endforeach
            </select>
        @else
            <span class="text-sm text-gray-600">
                {{ optional($item->verifikasi->user)->username ?? '-' }}
            </span>
        @endif
    </td>

    <td class="px-6 py-4">
        <div class="flex items-center justify-center gap-2">
            <button
                onclick="openDetailModal({{ $item->trx_usulan_ki_id }})"
                class="p-2 bg-blue-100 text-blue-600 rounded-lg"
            >
                👁
            </button>

            @if(optional($item->verifikasi)->titik_proses == 2)
                <button
                    onclick="verifikasiPengajuan(this, {{ $item->trx_usulan_ki_id }})"
                    class="p-2 bg-green-100 text-green-600 rounded-lg"
                >
                    ✔
                </button>

                <button
                    onclick="tolakPengajuan({{ $item->trx_usulan_ki_id }})"
                    class="p-2 bg-red-100 text-red-600 rounded-lg"
                >
                    ✖
                </button>
            @endif
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center py-6 text-gray-500">
        Tidak ada data pengajuan
    </td>
</tr>
@endforelse
</tbody>



                    <!-- Pagination -->
                    <div class="flex items-center justify-between bg-white px-6 py-4 rounded-xl shadow-md border border-gray-100">
                        <div class="text-sm text-gray-600">
                            Menampilkan <span class="font-semibold">1-5</span> dari <span class="font-semibold">45</span> pengajuan
                        </div>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                Sebelumnya
                            </button>
                            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-colors">
                                1
                            </button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                2
                            </button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                3
                            </button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- MODAL WITH 3 TABS -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-red-50 to-pink-50">
                <h2 class="text-2xl font-bold text-gray-800">Detail Pengajuan Hak Cipta</h2>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-red-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Tab Navigation -->
            <div class="flex border-b border-gray-200 bg-white">
                <button class="tab-button active" onclick="switchTab(event, 'detail')">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Detail Ajuan</span>
                    </div>
                </button>
                <button class="tab-button" onclick="switchTab(event, 'dokumen')">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <span>Dokumen</span>
                    </div>
                </button>
                <button class="tab-button" onclick="switchTab(event, 'kolaborator')">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Kolaborator</span>
                    </div>
                </button>
            </div>

            <!-- TAB 1: Detail Ajuan -->
<div id="detail" class="tab-content active">
    <div class="space-y-4">

        <div>
            <label class="text-sm font-semibold text-gray-600">Judul Paten</label>
            <p id="detailJudul" class="text-gray-800 mt-1 text-lg font-medium"></p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-gray-600">Pemohon</label>
                <p id="detailPemohon" class="text-gray-800 mt-1"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Email</label>
                <p id="detailEmail" class="text-gray-800 mt-1"></p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-gray-600">Tanggal Pengajuan</label>
                <p id="detailTanggal" class="text-gray-800 mt-1"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Status</label>
                <div id="detailStatus" class="mt-1"></div>
            </div>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-600">Deskripsi</label>
            <p id="detailDeskripsi" class="text-gray-800 mt-1 leading-relaxed"></p>
        </div>

    </div>
</div>


            <!-- TAB 2: Dokumen -->
            <div id="dokumen" class="tab-content">
                 <div id="dokumenList" class="space-y-3"></div>
                <div>
                    <label class="text-sm font-semibold text-gray-600 mb-3 block">Dokumen Pendukung</label>
                    <div class="space-y-3">
                        <div class="doc-item flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200 cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-100 rounded-lg">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Proposal_Paten.pdf</p>
                                    <p class="text-xs text-gray-500">2.4 MB • PDF Document</p>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-colors">
                                Download
                            </button>
                        </div>

                        <div class="doc-item flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200 cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-100 rounded-lg">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Diagram_Sistem.pdf</p>
                                    <p class="text-xs text-gray-500">1.8 MB • PDF Document</p>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-colors">
                                Download
                            </button>
                        </div>

                        <div class="doc-item flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200 cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Prototype_Image.jpg</p>
                                    <p class="text-xs text-gray-500">3.2 MB • Image</p>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-colors">
                                Download
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <button class="w-full px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white rounded-lg font-medium transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download Semua Dokumen
                        </button>
                    </div>
                </div>
            </div>

            <!-- TAB 3: Kolaborator -->
            <div id="kolaborator" class="tab-content">
                <div>
                    <label class="text-sm font-semibold text-gray-600 mb-3 block">Informasi Kolaborator</label>
                    
                    <div class="space-y-3">
                        <!-- Kolaborator 1 -->
                        <div class="kolaborator-item p-4 bg-white rounded-lg border border-gray-200">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    DH
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Dr. Ahmad Hidayat</h4>
                                    <div class="flex flex-wrap gap-3 text-xs text-gray-500">
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolaborator 2 -->
                        <div class="kolaborator-item p-4 bg-white rounded-lg border border-gray-200">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-500 to-teal-500 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    RS
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Ir. Rina Susanti, M.T.</h4>
                                    <div class="flex flex-wrap gap-3 text-xs text-gray-500">
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolaborator 3 -->
                        <div class="kolaborator-item p-4 bg-white rounded-lg border border-gray-200">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    BP
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Budi Prasetyo, S.T.</h4>
                                    <div class="flex flex-wrap gap-3 text-xs text-gray-500">
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mt-2">                                        
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex gap-3">
                <button onclick="closeDetailModal()" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors font-medium">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // ========== SIDEBAR TOGGLE ==========
        document.getElementById('dataKiToggle').addEventListener('click', function() {
            const menu = document.getElementById('dataKiMenu');
            const arrow = document.getElementById('dataKiArrow');
            
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        });

        // Auto-open submenu jika di halaman paten
        window.addEventListener('DOMContentLoaded', function() {
            const menu = document.getElementById('dataKiMenu');
            menu.classList.remove('hidden');
            document.getElementById('dataKiArrow').classList.add('rotate-180');
        });

        // ========== SEARCH FUNCTIONALITY ==========
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // ========== FILTER BY STATUS ==========
        document.getElementById('filterStatus').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('#tableBody tr');
            
            rows.forEach(row => {
                if (filterValue === '' || row.dataset.status === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // ========== TAB SWITCHING FUNCTION ==========
        function switchTab(event, tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected tab
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked button
            event.currentTarget.classList.add('active');
        }

        // ========== MODAL FUNCTIONS ==========
function verifikasiPengajuan(button, id) {
    const row = button.closest('tr');
    const reviewerSelect = row.querySelector('.reviewer-select');

    if (!reviewerSelect || reviewerSelect.value === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Reviewer belum dipilih',
            text: 'Silakan pilih reviewer terlebih dahulu.',
            confirmButtonColor: '#dc2626'
        });
        return;
    }

    const reviewerName =
        reviewerSelect.options[reviewerSelect.selectedIndex].text;

    Swal.fire({
        title: 'Konfirmasi Verifikasi',
        html: `
            <p>Yakin ingin memverifikasi pengajuan ini?</p>
            <p class="mt-2"><b>Reviewer:</b> ${reviewerName}</p>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Verifikasi',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (!result.isConfirmed) return;

        Swal.fire({
            title: 'Memproses...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        fetch(`/verifikator/hak-cipta/verifikasi/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                reviewer_id: reviewerSelect.value
            })
        })
        .then(res => res.json())
        .then(res => {
            Swal.close(); // 🔥 PENTING

            if (res.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Diverifikasi!',
                    text: 'Pengajuan telah diverifikasi.',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => location.reload());
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: res.message ?? 'Verifikasi gagal'
                });
            }
        })
        .catch(err => {
            Swal.close(); // 🔥 PENTING
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Gagal memverifikasi pengajuan'
            });
            console.error(err);
        });
    });
}
        function tolakPengajuan(id) {
            Swal.fire({
                title: 'Konfirmasi Penolakan',
                text: 'Yakin ingin menolak pengajuan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tolak',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (!result.isConfirmed) return;

                Swal.fire({
                    title: 'Memproses...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });

                fetch(`/verifikator/hak-cipta/verifikasi/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(res => {
                    Swal.close(); // 🔥 PENTING

                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pengajuan Ditolak',
                            text: 'Pengajuan telah ditolak.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => location.reload());
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: res.message ?? 'Penolakan gagal'
                        });
                    }
                })
                .catch(err => {
                    Swal.close(); // 🔥 PENTING
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Gagal menolak pengajuan'
                    });
                    console.error(err);
                });
            });
        }

        function openDetailModal(id) {
            console.log('ID diterima:', id); // 🔥 DEBUG
            fetch(`/verifikator/hak-cipta/${id}/detail`)
                .then(res => {
                     if (!res.ok) throw new Error('Request gagal');
                    return res.json();
             })
            .then(data => {
                    document.getElementById('detailJudul').innerText = data.judul ?? '-';
                    document.getElementById('detailPemohon').innerText = data.pemohon ?? '-';
                    document.getElementById('detailEmail').innerText = data.email ?? '-';
                    document.getElementById('detailTanggal').innerText = data.tanggal ?? '-';
                    document.getElementById('detailDeskripsi').innerText = data.deskripsi ?? '-';

                    let statusHtml = '-';
                    if (data.status === 2) {
                        statusHtml = '<span class="badge badge-warning">Menunggu Verifikasi</span>';
                    } else if (data.status === 3) {
                        statusHtml = '<span class="badge badge-success">Terverifikasi</span>';
                    } else if (data.status === 4) {
                        statusHtml = '<span class="badge badge-danger">Ditolak</span>';
                    }

                    document.getElementById('detailStatus').innerHTML = statusHtml;
                    document.getElementById('detailModal').classList.add('active');

                    const dokumenList = document.getElementById('dokumenList');
                    dokumenList.innerHTML = '';

            if (data.dokumen && data.dokumen.length) {
                data.dokumen.forEach(doc => {
                    dokumenList.innerHTML += `
    <div class="flex justify-between items-center p-3 border rounded-lg">
        <div>
            <p class="font-medium">${doc.nama_dokumen}</p>
            <p class="text-xs text-gray-500">${doc.file_path}</p>
        </div>
        <a
            href="/verifikator/hak-cipta/dokumen/${doc.trx_dokumen_ki_id}/download"
            class="px-3 py-1 bg-red-600 text-white rounded text-sm"
        >
            Download
        </a>
    </div>
`;
        });
            } else {
                dokumenList.innerHTML = `
                    <p class="text-sm text-gray-500">Tidak ada dokumen</p>
                `;

            }

            document.getElementById('detailModal').classList.add('active');
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal memuat detail pengajuan'
            });
        });
    }
    function closeDetailModal() {
    document.getElementById('detailModal').classList.remove('active');
    }


</script>
</body>
</html>
