@extends('layouts.app')

@section('title', 'Form Pengajuan Paten')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-8">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('pengajuan.index') }}" class="text-red-600 hover:text-red-700 flex items-center mb-4">
                ← Kembali
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Paten</h2>
            <p class="text-gray-600 mt-2">Isi formulir di bawah ini untuk mengajukan paten</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <!-- Step 1 -->
                <div class="flex items-center flex-1">
                    <div id="step-circle-1" class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center font-bold">
                        1
                    </div>
                    <div class="ml-3">
                        <p id="step-text-1" class="text-sm font-semibold text-red-600">Data Form</p>
                    </div>
                </div>
                
                <!-- Line 1 -->
                <div id="line-1" class="flex-1 h-1 bg-gray-300 mx-4"></div>
                
                <!-- Step 2 -->
                <div class="flex items-center flex-1">
                    <div id="step-circle-2" class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">
                        2
                    </div>
                    <div class="ml-3">
                        <p id="step-text-2" class="text-sm font-semibold text-gray-600">Upload Dokumen</p>
                    </div>
                </div>
                
                <!-- Line 2 -->
                <div id="line-2" class="flex-1 h-1 bg-gray-300 mx-4"></div>
                
                <!-- Step 3 -->
                <div class="flex items-center flex-1">
                    <div id="step-circle-3" class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">
                        3
                    </div>
                    <div class="ml-3">
                        <p id="step-text-3" class="text-sm font-semibold text-gray-600">Kolaborator</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" id="multiStepForm">
            @csrf
            <input type="hidden" name="jenis_ki" value="paten">

            <!-- PAGE 1: Data Form -->
            <div id="page-1" class="form-page">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Paten</h3>

                <!-- Judul Paten -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Judul Paten *</label>
                    <input type="text" name="judul" id="judul" required
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Masukkan judul paten">
                </div>

                <!-- Jenis Paten -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Jenis Paten *</label>
                    <select name="jenis_paten" id="jenis_paten" required 
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="" disabled selected>Pilih Jenis Paten</option>
                        <option value="paten_biasa">Paten Biasa</option>
                        <option value="paten_sederhana">Paten Sederhana</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Deskripsi *</label>
                    <textarea name="deskripsi" id="deskripsi" required rows="5"
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Jelaskan invensi Anda secara detail"></textarea>
                </div>

                <!-- Bidang Teknologi -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Bidang Teknologi *</label>
                    <select name="bidang_teknologi" id="bidang_teknologi" required 
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="" disabled selected>Pilih Bidang Teknologi</option>
                        <option value="baterai">Baterai</option>
                        <option value="biologi">Biologi</option>
                        <option value="biomass_biomaterial">Biomass dan Biomaterial</option>
                        <option value="bioteknologi">Bioteknologi</option>
                        <option value="energi_baru_terbarukan">Energi Baru dan Terbarukan</option>
                        <option value="farmasi">Farmasi</option>
                        <option value="kelistrikan">Kelistrikan</option>
                        <option value="kimia_material">Kimia Material</option>
                        <option value="kimia_non_organik">Kimia non-Organik</option>
                        <option value="kimia_organik">Kimia Organik</option>
                        <option value="obat_herbal">Obat Herbal</option>
                        <option value="metalurgi">Metalurgi</option>
                        <option value="nanoteknologi">Nanoteknologi</option>
                        <option value="optik_sensor">Optik dan Sensor</option>
                        <option value="pakan">Pakan</option>
                        <option value="pangan">Pangan</option>
                        <option value="penginderaan_jauh">Penginderaan Jauh</option>
                        <option value="semi_konduktor">Semi Konduktor</option>
                        <option value="teknologi_komputer">Teknologi Komputer</option>
                        <option value="teknologi_medis">Teknologi Medis</option>
                        <option value="teknologi_pengukuran">Teknologi Pengukuran</option>
                        <option value="teknologi_transportasi">Teknologi Transportasi</option>
                        <option value="telekomunikasi">Telekomunikasi</option>
                        <option value="mesin_elektronika">Mesin dan Elektronika</option>
                    </select>
                </div>

                <!-- Tanggal Pembuatan -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Tanggal Pembuatan *</label>
                    <input type="date" name="tanggal_pembuatan" id="tanggal_pembuatan" required
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        max="{{ date('Y-m-d') }}">
                </div>

                <!-- Buttons Page 1 -->
                <div class="flex gap-4">
                    <button type="button" onclick="saveDraft()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Simpan Draft
                    </button>
                    <button type="button" onclick="nextPage(2)" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Lanjut →
                    </button>
                    <a href="{{ route('pengajuan.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded transition duration-200 flex items-center justify-center">
                        Batal
                    </a>
                </div>
            </div>

            <!-- PAGE 2: Upload Dokumen -->
            <div id="page-2" class="form-page hidden">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Upload Dokumen</h3>

                <!-- Dokumen PDF -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Dokumen Deskripsi (PDF) *</label>
                    <input type="file" name="dokumen_deskripsi" id="dokumen_deskripsi" accept=".pdf"
                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <p class="text-sm text-gray-500 mt-1">Format: PDF, Maksimal 10MB</p>
                </div>

                <!-- Klaim Paten -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Klaim Paten (PDF)</label>
                    <input type="file" name="dokumen_klaim" id="dokumen_klaim" accept=".pdf"
                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <p class="text-sm text-gray-500 mt-1">Format: PDF, Maksimal 10MB</p>
                </div>

                <!-- Abstrak -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Abstrak (PDF)</label>
                    <input type="file" name="dokumen_abstrak" id="dokumen_abstrak" accept=".pdf"
                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <p class="text-sm text-gray-500 mt-1">Format: PDF, Maksimal 10MB</p>
                </div>

                <!-- Gambar/Ilustrasi -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Gambar/Ilustrasi Teknis</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*,.pdf"
                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, atau PDF, Maksimal 5MB</p>
                </div>

                <!-- Surat Pernyataan -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Surat Pernyataan Kepemilikan (PDF)</label>
                    <input type="file" name="surat_pernyataan" id="surat_pernyataan" accept=".pdf"
                        class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <p class="text-sm text-gray-500 mt-1">Format: PDF, Maksimal 5MB</p>
                </div>

                <!-- Buttons Page 2 -->
                <div class="flex gap-4">
                    <button type="button" onclick="previousPage(1)" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded transition duration-200">
                        ← Kembali
                    </button>
                    <button type="button" onclick="saveDraft()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Simpan Draft
                    </button>
                    <button type="button" onclick="nextPage(3)" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Lanjut →
                    </button>
                </div>
            </div>

            <!-- PAGE 3: Kolaborator -->
            <div id="page-3" class="form-page hidden">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Kolaborator</h3>
                
                <p class="text-gray-600 mb-4">Tambahkan kolaborator yang terlibat dalam pembuatan paten ini (opsional)</p>

                <!-- Kolaborator List -->
                <div id="kolaborator-list" class="mb-6">
                    <!-- Kolaborator items will be added here dynamically -->
                </div>

                <!-- Add Kolaborator Button -->
                <button type="button" onclick="addKolaborator()" class="mb-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded transition duration-200">
                    + Tambah Kolaborator
                </button>

                <!-- Pernyataan -->
                <div class="mb-6">
                    <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
                        <label class="flex items-start">
                            <input type="checkbox" name="pernyataan" id="pernyataan" required
                                class="mt-1 mr-3 h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <span class="text-sm text-gray-700">
                                Saya menyatakan bahwa ciptaan ini adalah hasil karya sendiri dan/atau bersama kolaborator yang tercantum, 
                                bukan merupakan jiplakan dari karya orang lain. Saya bertanggung jawab penuh atas kebenaran data yang diisikan.
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Buttons Page 3 -->
                <div class="flex gap-4">
                    <button type="button" onclick="previousPage(2)" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded transition duration-200">
                        ← Kembali
                    </button>
                    <button type="button" onclick="saveDraft()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Simpan Draft
                    </button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        ✓ Submit Pengajuan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
let currentPage = 1;
let kolaboratorCount = 0;

function nextPage(page) {
    // Validate current page before moving to next
    if (!validatePage(currentPage)) {
        return;
    }

    // Hide current page
    document.getElementById(`page-${currentPage}`).classList.add('hidden');
    
    // Show next page
    document.getElementById(`page-${page}`).classList.remove('hidden');
    
    // Update progress
    updateProgress(page);
    
    currentPage = page;
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function previousPage(page) {
    // Hide current page
    document.getElementById(`page-${currentPage}`).classList.add('hidden');
    
    // Show previous page
    document.getElementById(`page-${page}`).classList.remove('hidden');
    
    // Update progress
    updateProgress(page);
    
    currentPage = page;
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateProgress(page) {
    // Reset all steps
    for (let i = 1; i <= 3; i++) {
        const circle = document.getElementById(`step-circle-${i}`);
        const text = document.getElementById(`step-text-${i}`);
        
        if (i < page) {
            // Completed steps
            circle.className = 'w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center font-bold';
            text.className = 'text-sm font-semibold text-green-600';
        } else if (i === page) {
            // Current step
            circle.className = 'w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center font-bold';
            text.className = 'text-sm font-semibold text-red-600';
        } else {
            // Future steps
            circle.className = 'w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold';
            text.className = 'text-sm font-semibold text-gray-600';
        }
    }
    
    // Update lines
    for (let i = 1; i <= 2; i++) {
        const line = document.getElementById(`line-${i}`);
        if (i < page) {
            line.className = 'flex-1 h-1 bg-green-500 mx-4';
        } else {
            line.className = 'flex-1 h-1 bg-gray-300 mx-4';
        }
    }
}

function validatePage(page) {
    if (page === 1) {
        // Validate page 1 fields
        const judul = document.getElementById('judul').value.trim();
        const jenisPaten = document.getElementById('jenis_paten').value;
        const inventor = document.getElementById('inventor').value.trim();
        const deskripsi = document.getElementById('deskripsi').value.trim();
        const bidangTeknologi = document.getElementById('bidang_teknologi').value;
        const tanggalPembuatan = document.getElementById('tanggal_pembuatan').value;
        
        if (!judul) {
            alert('Judul Paten harus diisi');
            document.getElementById('judul').focus();
            return false;
        }
        
        if (!jenisPaten) {
            alert('Jenis Paten harus dipilih');
            document.getElementById('jenis_paten').focus();
            return false;
        }
        
        if (!inventor) {
            alert('Nama Inventor harus diisi');
            document.getElementById('inventor').focus();
            return false;
        }
        
        if (!deskripsi) {
            alert('Deskripsi harus diisi');
            document.getElementById('deskripsi').focus();
            return false;
        }
        
        if (!bidangTeknologi) {
            alert('Bidang Teknologi harus dipilih');
            document.getElementById('bidang_teknologi').focus();
            return false;
        }
        
        if (!tanggalPembuatan) {
            alert('Tanggal Pembuatan harus diisi');
            document.getElementById('tanggal_pembuatan').focus();
            return false;
        }
    }
    
    if (page === 2) {
        // Optional: Add validation for page 2 if needed
        // For now, we'll allow moving to page 3 without file uploads
    }
    
    return true;
}

function addKolaborator() {
    kolaboratorCount++;
    const kolaboratorList = document.getElementById('kolaborator-list');
    
    const kolaboratorItem = document.createElement('div');
    kolaboratorItem.className = 'border border-gray-300 rounded-lg p-4 mb-4';
    kolaboratorItem.id = `kolaborator-${kolaboratorCount}`;
    
    kolaboratorItem.innerHTML = `
        <div class="flex justify-between items-center mb-3">
            <h4 class="font-bold text-gray-700">Kolaborator ${kolaboratorCount}</h4>
            <button type="button" onclick="removeKolaborator(${kolaboratorCount})" class="text-red-600 hover:text-red-700 font-bold">
                ✕ Hapus
            </button>
        </div>
        
        <div class="mb-3">
            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" name="kolaborator_nama[]"
                class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Nama lengkap kolaborator">
        </div>
        
        <div class="mb-3">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="kolaborator_email[]"
                class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="email@example.com">
        </div>
        
        <div class="mb-3">
            <label class="block text-gray-700 font-medium mb-2">Institusi/Afiliasi</label>
            <input type="text" name="kolaborator_institusi[]"
                class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Nama institusi">
        </div>
        
        <div>
            <label class="block text-gray-700 font-medium mb-2">Peran/Kontribusi</label>
            <textarea name="kolaborator_peran[]" rows="2"
                class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Jelaskan peran dan kontribusi"></textarea>
        </div>
    `;
    
    kolaboratorList.appendChild(kolaboratorItem);
}

function removeKolaborator(id) {
    const kolaboratorItem = document.getElementById(`kolaborator-${id}`);
    if (kolaboratorItem) {
        if (confirm('Apakah Anda yakin ingin menghapus kolaborator ini?')) {
            kolaboratorItem.remove();
        }
    }
}

function saveDraft() {
    // You can implement save draft functionality here
    // For now, just show a confirmation
    if (confirm('Apakah Anda yakin ingin menyimpan draft? Data Anda akan disimpan dan dapat dilanjutkan nanti.')) {
        alert('Draft berhasil disimpan! (Fitur ini perlu implementasi backend)');
    }
}

// Form submission validation
document.getElementById('multiStepForm').addEventListener('submit', function(e) {
    const pernyataan = document.getElementById('pernyataan').checked;
    
    if (!pernyataan) {
        e.preventDefault();
        alert('Anda harus menyetujui pernyataan sebelum submit');
        return false;
    }
    
    // Final validation before submit
    if (!validatePage(1)) {
        e.preventDefault();
        // Go back to page 1 if validation fails
        previousPage(1);
        return false;
    }
});
</script>
@endpush
@endsection