@extends('layouts.app')

@section('title', 'Dashboard User - Pencatatan KI')

@section('content')
<div class="min-h-screen flex flex-col">
    <!-- Main Content -->
    <div class="flex-grow">
        <div class="bg-white rounded-xl shadow-md">
            <!-- Page Header -->
            <div class="border-b border-gray-200 px-8 py-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-gray-600 text-sm mt-1">...</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Total Pengajuan -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Pengajuan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Disetujui -->
                        <div class="bg-gray-200 rounded-lg p-8 text-center">
                            <p class="text-gray-700 text-lg font-medium">Disetujui</p>
                        </div>

                        <!-- Diproses -->
                        <div class="bg-gray-200 rounded-lg p-8 text-center">
                            <p class="text-gray-700 text-lg font-medium">Diproses</p>
                        </div>

                        <!-- Ditolak -->
                        <div class="bg-gray-200 rounded-lg p-8 text-center">
                            <p class="text-gray-700 text-lg font-medium">Ditolak</p>
                        </div>
                    </div>
                </div>

                <!-- Status Terbaru -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Status Terbaru</h2>
                        <a href="#" class="text-sm text-red-600 hover:text-red-700">Lihat Semua ></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Status Card 1 -->
                        <div class="bg-gray-200 rounded-lg p-16 text-center">
                            <!-- Empty card placeholder -->
                        </div>

                        <!-- Status Card 2 -->
                        <div class="bg-gray-200 rounded-lg p-16 text-center">
                            <!-- Empty card placeholder -->
                        </div>

                        <!-- Status Card 3 -->
                        <div class="bg-gray-200 rounded-lg p-16 text-center">
                            <!-- Empty card placeholder -->
                        </div>
                    </div>
                </div>

                <!-- Informasi Penting -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Informasi Penting</h2>
                        <a href="#" class="text-sm text-red-600 hover:text-red-700">Lihat Semua ></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Info Card 1 -->
                        <div class="bg-gray-200 rounded-lg p-12 text-center">
                            <p class="text-gray-700 text-lg font-medium">Pengumuman</p>
                        </div>

                        <!-- Info Card 2 -->
                        <div class="bg-gray-200 rounded-lg p-12 text-center">
                            <p class="text-gray-700 text-lg font-medium">Pengumuman</p>
                        </div>

                        <!-- Info Card 3 -->
                        <div class="bg-gray-200 rounded-lg p-12 text-center">
                            <p class="text-gray-700 text-lg font-medium">Pengumuman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection