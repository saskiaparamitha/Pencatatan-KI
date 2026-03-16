@extends('layouts.app')

@section('title', 'Riwayat Pengajuan')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
    <div class="bg-white rounded-xl shadow-md p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <a href="{{ route('user.dashboard') }}" class="text-red-600 hover:text-red-700 text-sm mb-2 inline-block">← Kembali</a>
                <h2 class="text-2xl font-bold text-gray-800">Riwayat Pengajuan</h2>
                <p class="text-gray-500 text-sm mt-1">Semua pengajuan yang telah Anda submit</p>
            </div>
        </div>

        <!-- Filter Status -->
        <div class="flex gap-2 mb-6 flex-wrap">
            <button onclick="filterStatus('semua')" id="filter-semua"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-red-600 bg-red-600 text-white transition">
                Semua
            </button>
            <button onclick="filterStatus('Kirim')" id="filter-Kirim"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-blue-400 hover:text-blue-600 transition">
                Kirim
            </button>
            <button onclick="filterStatus('Proses Review')" id="filter-Proses Review"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-yellow-400 hover:text-yellow-600 transition">
                Proses Review
            </button>
            <button onclick="filterStatus('Terima')" id="filter-Terima"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-cyan-400 hover:text-cyan-600 transition">
                Terima
            </button>
            <button onclick="filterStatus('Selesai')" id="filter-Selesai"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-green-400 hover:text-green-600 transition">
                Selesai
            </button>
            <button onclick="filterStatus('Tolak')" id="filter-Tolak"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-red-400 hover:text-red-600 transition">
                Ditolak
            </button>
            <button onclick="filterStatus('Draft')" id="filter-Draft"
                class="filter-btn px-4 py-1.5 text-sm rounded-full border border-gray-300 text-gray-600 hover:border-gray-400 transition">
                Draft
            </button>
        </div>

        <!-- List Pengajuan -->
        @if($pengajuan->count() > 0)
        <div class="space-y-3" id="pengajuan-list">
            @foreach($pengajuan as $item)
            @php
                $namaStatus = $item->status->nama_status ?? 'Draft';
                $statusConfig = [
                    'Selesai'       => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                    'Kirim'         => ['bg' => 'bg-blue-100',  'text' => 'text-blue-700',  'dot' => 'bg-blue-500'],
                    'Terima'        => ['bg' => 'bg-cyan-100',  'text' => 'text-cyan-700',  'dot' => 'bg-cyan-500'],
                    'Proses Review' => ['bg' => 'bg-yellow-100','text' => 'text-yellow-700','dot' => 'bg-yellow-500'],
                    'Tolak'         => ['bg' => 'bg-red-100',   'text' => 'text-red-700',   'dot' => 'bg-red-500'],
                    'Draft'         => ['bg' => 'bg-gray-100',  'text' => 'text-gray-600',  'dot' => 'bg-gray-400'],
                ];
                $cfg = $statusConfig[$namaStatus] ?? $statusConfig['Draft'];
            @endphp
            <div
               data-status="{{ $namaStatus }}"
               class="pengajuan-item flex items-center justify-between bg-gray-50 hover:bg-red-50 border border-gray-200 hover:border-red-200 rounded-xl px-5 py-4 transition duration-200">
                
                <div class="flex items-center gap-4">
                    <!-- Icon -->
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <!-- Info -->
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">{{ $item->judul }}</p>
                        <div class="flex items-center gap-3 mt-1">
                            <span class="text-xs text-gray-500">{{ $item->mstKI->nama_ki ?? 'N/A' }}</span>
                            <span class="text-gray-300">•</span>
                            <span class="text-xs text-gray-500">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Status + Arrow -->
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $cfg['bg'] }} {{ $cfg['text'] }}">
                        <span class="inline-block w-1.5 h-1.5 rounded-full mr-1 {{ $cfg['dot'] }}"></span>
                        {{ $namaStatus }}
                    </span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty state setelah filter -->
        <div id="empty-filter" class="hidden text-center py-12">
            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-gray-500">Tidak ada pengajuan dengan status ini</p>
        </div>

        @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-gray-500 font-medium">Belum ada pengajuan</p>
            <p class="text-gray-400 text-sm mt-1">Mulai buat pengajuan pertama Anda</p>
            <a href="{{ route('pengajuan.index') }}" 
               class="inline-block mt-4 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-6 py-2 rounded-lg transition">
                Buat Pengajuan
            </a>
        </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
function filterStatus(status) {
    const items = document.querySelectorAll('.pengajuan-item');
    const emptyFilter = document.getElementById('empty-filter');
    const buttons = document.querySelectorAll('.filter-btn');

    // Update active button
    buttons.forEach(btn => {
        btn.classList.remove('bg-red-600', 'text-white', 'border-red-600');
        btn.classList.add('border-gray-300', 'text-gray-600');
    });
    const activeBtn = document.getElementById(`filter-${status}`);
    if (activeBtn) {
        activeBtn.classList.add('bg-red-600', 'text-white', 'border-red-600');
        activeBtn.classList.remove('border-gray-300', 'text-gray-600');
    }

    // Filter items
    let visibleCount = 0;
    items.forEach(item => {
        if (status === 'semua' || item.dataset.status === status) {
            item.classList.remove('hidden');
            visibleCount++;
        } else {
            item.classList.add('hidden');
        }
    });

    // Toggle empty state
    emptyFilter.classList.toggle('hidden', visibleCount > 0);
}
</script>
@endpush
@endsection