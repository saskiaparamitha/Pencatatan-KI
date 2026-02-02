@extends('layouts.app')

@section('title', 'Form Pengajuan Hak Cipta')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('pengajuan.index') }}" class="text-red-600 hover:text-red-700 flex items-center mb-4">
                ← Kembali
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Hak Cipta</h2>
            <p class="text-gray-600 mt-2">Isi formulir di bawah ini untuk mengajukan hak cipta</p>
        </div>

        <!-- Form -->
        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jenis_ki" value="hak_cipta">

            <!-- Informasi Ciptaan -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Informasi Ciptaan</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Ciptaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul_ciptaan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            placeholder="Judul karya yang akan didaftarkan" value="{{ old('judul_ciptaan') }}">
                        @error('judul_ciptaan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Ciptaan <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_ciptaan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="">Pilih Jenis Ciptaan</option>
                            <option value="buku" {{ old('jenis_ciptaan') == 'buku' ? 'selected' : '' }}>Buku</option>
                            <option value="musik" {{ old('jenis_ciptaan') == 'musik' ? 'selected' : '' }}>Musik/Lagu</option>
                            <option value="film" {{ old('jenis_ciptaan') == 'film' ? 'selected' : '' }}>Film/Video</option>
                            <option value="program_komputer" {{ old('jenis_ciptaan') == 'program_komputer' ? 'selected' : '' }}>Program Komputer</option>
                            <option value="fotografi" {{ old('jenis_ciptaan') == 'fotografi' ? 'selected' : '' }}>Fotografi</option>
                            <option value="seni_rupa" {{ old('jenis_ciptaan') == 'seni_rupa' ? 'selected' : '' }}>Seni Rupa</option>
                            <option value="drama" {{ old('jenis_ciptaan') == 'drama' ? 'selected' : '' }}>Drama/Tari</option>
                            <option value="lainnya" {{ old('jenis_ciptaan') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_ciptaan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Pertama Kali Diumumkan <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_diumumkan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            value="{{ old('tanggal_diumumkan') }}">
                        @error('tanggal_diumumkan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Uraian Singkat Ciptaan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="uraian_ciptaan" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            placeholder="Jelaskan secara singkat tentang ciptaan Anda">{{ old('uraian_ciptaan') }}</textarea>
                        @error('uraian_ciptaan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Dokumen Pendukung -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Dokumen Pendukung</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            KTP Pencipta <span class="text-red-500">*</span>
                        </label>
                        <input type="file" name="ktp" accept=".pdf,.jpg,.jpeg,.png" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG. Maksimal 2MB</p>
                        @error('ktp')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Gambar/Ilustrasi (opsional)</label>
                        <input type="file" name="gambar" accept="image/*,.pdf"
                            class="border rounded w-full py-2 px-3">
                    </div>
                </div>
            </div>

            <!-- Pernyataan -->
            <div class="mb-6">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <label class="flex items-start">
                        <input type="checkbox" name="pernyataan" required
                            class="mt-1 mr-3 h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        <span class="text-sm text-gray-700">
                            Saya menyatakan bahwa ciptaan ini adalah hasil karya sendiri dan bukan merupakan jiplakan dari karya orang lain. 
                            Saya bertanggung jawab penuh atas kebenaran data yang diisikan.
                        </span>
                    </label>
                    @error('pernyataan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-4">
                <button type="submit"
                    class="flex-1 bg-red-600 text-white py-3 px-6 rounded-lg hover:bg-red-700 transition font-medium">
                    Ajukan Hak Cipta
                </button>
                <a href="{{ route('pengajuan.index') }}"
                    class="flex-1 bg-gray-200 text-gray-700 py-3 px-6 rounded-lg hover:bg-gray-300 transition font-medium text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection