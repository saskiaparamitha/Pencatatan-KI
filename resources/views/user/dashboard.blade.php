@extends('layouts.app')

@section('title', 'Dashboard User - Pencatatan KI')

@section('content')
<div>
    <!-- Main Content -->
    <div>
        <div class="bg-white rounded-xl shadow-md">
            <!-- Page Header -->
            <div class="border-b border-gray-200 px-8 py-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-gray-600 text-sm mt-1">Selamat datang di Sistem Pencatatan Kekayaan Intelektual</p>
                    </div>
                    <div class="text-sm text-gray-500" id="last-update">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Total Pengajuan -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Pengajuan</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Disetujui -->
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-8 text-center transition-all duration-500 hover:shadow-lg" id="card-disetujui">
                            <div class="flex items-center justify-center mb-2">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg font-medium mb-2">Disetujui</p>
                            <p class="text-4xl font-bold text-green-600" id="count-disetujui">{{ $disetujui ?? 0 }}</p>
                            <p class="text-sm text-gray-600 mt-2">Pengajuan</p>
                        </div>

                        <!-- Diproses -->
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-8 text-center transition-all duration-500 hover:shadow-lg" id="card-diproses">
                            <div class="flex items-center justify-center mb-2">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg font-medium mb-2">Diproses</p>
                            <p class="text-4xl font-bold text-yellow-600" id="count-diproses">{{ $diproses ?? 0 }}</p>
                            <p class="text-sm text-gray-600 mt-2">Pengajuan</p>
                        </div>

                        <!-- Ditolak -->
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-8 text-center transition-all duration-500 hover:shadow-lg" id="card-ditolak">
                            <div class="flex items-center justify-center mb-2">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg font-medium mb-2">Ditolak</p>
                            <p class="text-4xl font-bold text-red-600" id="count-ditolak">{{ $ditolak ?? 0 }}</p>
                            <p class="text-sm text-gray-600 mt-2">Pengajuan</p>
                        </div>
                    </div>
                </div>

                <!-- Status Terbaru -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Status Terbaru</h2>
                        <a href="{{ route('pengajuan.riwayat') }}" class="text-sm text-red-600 hover:text-red-700">Lihat Semua ></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="status-container">
                        @if(isset($statusTerbaru) && $statusTerbaru->count() > 0)
                            @foreach($statusTerbaru as $pengajuan)
                            @php
                                $namaStatus = $pengajuan->status->nama_status ?? 'Draft';
                                $statusConfig = [
                                    'Selesai'       => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                                    'Kirim'         => ['bg' => 'bg-blue-100',  'text' => 'text-blue-700',  'dot' => 'bg-blue-500'],
                                    'Terima'        => ['bg' => 'bg-cyan-100',  'text' => 'text-cyan-700',  'dot' => 'bg-cyan-500'],
                                    'Proses Review' => ['bg' => 'bg-yellow-100','text' => 'text-yellow-700','dot' => 'bg-yellow-500'],
                                    'Tolak'         => ['bg' => 'bg-red-100',   'text' => 'text-red-700',   'dot' => 'bg-red-500'],
                                    'Draft'         => ['bg' => 'bg-gray-100',  'text' => 'text-gray-600',  'dot' => 'bg-gray-400'],
                                ];
                                $cfg = $statusConfig[$namaStatus] ?? $statusConfig['Draft'];
                                $namaKI = $pengajuan->mstKI->nama_ki ?? 'N/A';
                            @endphp
                            <div class="bg-white border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-200 flex flex-col justify-between">
                                <!-- Header: Judul + Badge Status -->
                                <div class="flex justify-between items-start mb-3 gap-2">
                                    <h3 class="font-semibold text-gray-800 text-sm line-clamp-2 flex-1">{{ $pengajuan->judul }}</h3>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full whitespace-nowrap {{ $cfg['bg'] }} {{ $cfg['text'] }}">
                                        <span class="inline-block w-1.5 h-1.5 rounded-full mr-1 {{ $cfg['dot'] }}"></span>
                                        {{ $namaStatus }}
                                    </span>
                                </div>
                                <!-- Deskripsi -->
                                <p class="text-xs text-gray-500 mb-4 line-clamp-2">{{ Str::limit(str_replace(["\n", "\r"], ' ', $pengajuan->deskripsi ?? ''), 80) }}</p>
                                <!-- Footer -->
                                <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span class="text-xs text-gray-500">{{ $namaKI }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-xs text-gray-500">{{ $pengajuan->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-3 bg-gray-50 rounded-xl p-12 text-center">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-gray-500 font-medium">Belum ada pengajuan</p>
                                <p class="text-gray-400 text-sm mt-1">Pengajuan yang Anda submit akan muncul di sini</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Informasi Penting -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Informasi Penting</h2>
                        <a href="#" class="text-sm text-red-600 hover:text-red-700">Lihat Semua ></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Pengumuman 1 -->
                        <div class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-lg p-6">
                            <div class="flex items-start mb-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Pembaruan Sistem</h3>
                                    <p class="text-xs text-gray-600">Dashboard sekarang auto-refresh setiap 30 detik untuk menampilkan data terbaru.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pengumuman 2 -->
                        <div class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-lg p-6">
                            <div class="flex items-start mb-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Panduan Pengajuan</h3>
                                    <p class="text-xs text-gray-600">Pastikan semua dokumen lengkap sebelum submit pengajuan kekayaan intelektual.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pengumuman 3 -->
                        <div class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-lg p-6">
                            <div class="flex items-start mb-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <h3 class="font-semibold text-gray-800 text-sm mb-2">Support</h3>
                                    <p class="text-xs text-gray-600">Butuh bantuan? Hubungi admin untuk informasi lebih lanjut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Real-time Update -->
<script>
let refreshInterval;

function animateCounter(elementId, newValue, cardId) {
    const element = document.getElementById(elementId);
    const card = document.getElementById(cardId);
    
    if (!element || !card) return;
    
    const currentValue = parseInt(element.textContent) || 0;
    
    if (currentValue !== newValue) {
        card.classList.add('ring-4', 'ring-blue-300');
        
        const duration = 500;
        const steps = 20;
        const increment = (newValue - currentValue) / steps;
        let step = 0;
        
        const timer = setInterval(() => {
            step++;
            element.textContent = Math.round(currentValue + (increment * step));
            
            if (step >= steps) {
                clearInterval(timer);
                element.textContent = newValue;
                setTimeout(() => card.classList.remove('ring-4', 'ring-blue-300'), 500);
            }
        }, duration / steps);
    }
}

async function refreshStats() {
    try {
        // Fetch data terbaru dari server
        const response = await fetch(window.location.pathname + '?ajax=1', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
        
        if (response.ok) {
            const data = await response.json();
            
            // Update counters dengan animasi
            animateCounter('count-disetujui', data.disetujui || 0, 'card-disetujui');
            animateCounter('count-diproses', data.diproses || 0, 'card-diproses');
            animateCounter('count-ditolak', data.ditolak || 0, 'card-ditolak');
            
            // Update waktu
            const updateElement = document.getElementById('last-update');
            if (updateElement) {
                updateElement.innerHTML = '<i class="fas fa-sync-alt"></i> Update terakhir: Baru saja';
            }
        }
    } catch (error) {
        console.error('Error refreshing stats:', error);
    }
}

// Mulai auto-refresh
function startAutoRefresh() {
    refreshInterval = setInterval(refreshStats, 30000); // 30 detik
}

// Jalankan saat DOM ready
document.addEventListener('DOMContentLoaded', function() {
    startAutoRefresh();
    console.log('Auto-refresh dashboard aktif (setiap 30 detik)');
});

// Refresh saat tab aktif kembali
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        refreshStats();
    }
});

// Cleanup saat leave page
window.addEventListener('beforeunload', function() {
    if (refreshInterval) {
        clearInterval(refreshInterval);
    }
});
</script>

<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection