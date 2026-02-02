@extends('layouts.app')

@section('title', 'Pengajuan - Pencatatan KI')

@section('content')
<div class="bg-white rounded-xl shadow-md">
    <!-- Page Header -->
    <div class="border-b border-gray-200 px-8 py-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Pilih Jenis Pengajuan</h2>
                <p class="text-gray-600 text-sm mt-1">Pilih jenis kekayaan intelektual yang ingin Anda ajukan</p>
            </div>
            <a href="{{ route('user.panduan') }}" class="flex items-center gap-2 text-red-600 hover:text-red-700 font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Butuh Bantuan?
            </a>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-8">
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Pengajuan</p>
                    <p class="text-4xl font-bold text-red-600 mt-2">24</p>
                </div>
                <div class="bg-red-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Disetujui</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">18</p>
                </div>
                <div class="bg-green-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Dalam Proses</p>
                    <p class="text-4xl font-bold text-yellow-600 mt-2">5</p>
                </div>
                <div class="bg-yellow-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-gray-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Ditolak</p>
                    <p class="text-4xl font-bold text-gray-600 mt-2">1</p>
                </div>
                <div class="bg-gray-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="p-8">
        <!-- Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Paten Card -->
            <a href="{{ route('pengajuan.paten') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">📜</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Paten</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan untuk invensi</p>
            </a>

            <!-- Hak Cipta Card -->
            <a href="{{ route('pengajuan.hak-cipta') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">©️</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Hak Cipta</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan untuk karya cipta</p>
            </a>

            <!-- PVT Card -->
            <a href="{{ route('pengajuan.pvt') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">🌱</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">PVT</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan varietas tanaman</p>
            </a>
        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Merek Card -->
            <a href="{{ route('pengajuan.merek') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">®️</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Merek</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan untuk merek dagang</p>
            </a>

            <!-- Desain Industri Card -->
            <a href="{{ route('pengajuan.desain-industri') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">🎨</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Desain Industri</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan untuk desain produk</p>
            </a>

            <!-- Desain TSLT Card -->
            <a href="{{ route('pengajuan.desain-tlst') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">💡</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Desain TSLT</h3>
                <p class="text-xs text-gray-500 mt-2">Tata letak sirkuit terpadu</p>
            </a>
        </div>

        <!-- Row 3 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Indikasi Geografis Card -->
            <a href="{{ route('pengajuan.indikasi-geografis') }}" class="group bg-gradient-to-br from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 rounded-xl p-8 text-center transition-all duration-300 shadow-md hover:shadow-xl border-2 border-gray-200 hover:border-red-400 transform hover:-translate-y-1">
                <div class="text-6xl mb-4 transform group-hover:scale-110 transition-transform duration-300">🗺️</div>
                <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-700 transition-colors">Indikasi Geografis</h3>
                <p class="text-xs text-gray-500 mt-2">Perlindungan produk daerah</p>
            </a>
        </div>
    </div>
</div>
@endsection