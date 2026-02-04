@extends('layouts.app')

@section('title', 'Form Pengajuan Merek')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-8">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('pengajuan.index') }}" class="text-red-600 hover:text-red-700 flex items-center mb-4">
                ← Kembali
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Merek</h2>
            <p class="text-gray-600 mt-2">Isi formulir di bawah ini untuk mengajukan merek</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <strong class="font-bold">Error!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

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
                        <p id="step-text-2" class="text-sm font-semibold text-gray-600">Kolaborator</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('pengajuan.storeDataForm') }}" method="POST" enctype="multipart/form-data" id="multiStepForm">
            @csrf
            <input type="hidden" name="jenis_ki" value="merek">

            <!-- PAGE 1: Data Form -->
            <div id="page-1" class="form-page">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Merek</h3>
                
                <!-- Judul Merek -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Judul Merek *</label>
                    <input type="text" name="judul" id="judul" required
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Masukkan judul merek">
                </div>

                <!-- Uraian Warna Merek -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Uraian Warna Merek *</label>
                    <textarea name="uraian_warna_merek" id="uraian_warna_merek" required rows="5"
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Uraian warna merek Anda"></textarea>
                </div>

                <!-- Arti Merek -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Arti Merek *</label>
                    <textarea name="arti_merek" id="arti_merek" required rows="5"
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Arti dari merek Anda"></textarea>
                </div>

                <!-- Kuasa Merek -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Kuasa Merek *</label>
                    <textarea name="kuasa_merek" id="kuasa_merek" required rows="5"
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Kuasa merek Anda"></textarea>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Deskripsi *</label>
                    <textarea name="deskripsi" id="deskripsi" required rows="5"
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Jelaskan merek Anda"></textarea>
                </div>

                <!-- Tanggal Merek -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Tanggal Merek *</label>
                    <input type="date" name="tanggal_merek" id="tanggal_merek" required
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        max="{{ date('Y-m-d') }}">
                </div>

                <!-- Dokumen --> 
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Dokumen Deskripsi (PDF) *</label>
                    
                    <!-- Container untuk input file multiple -->
                    <div id="dokumen-deskripsi-container">
                        <div class="dokumen-deskripsi-item mb-2">
                            <input type="file" name="dokumen_deskripsi[]" accept=".pdf, .jpg, .jpeg, .png" multiple
                                class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                    </div>
                </div>

                <!-- Buttons Page 1 -->
                <div class="flex gap-4">
                    <button type="button" onclick="saveDraft()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Simpan Draft
                    </button>
                    <button type="button" onclick="nextPage(2)" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Lanjut
                    </button>
                    <a href="{{ route('pengajuan.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded transition duration-200 flex items-center justify-center">
                        Batal
                    </a>
                </div>
            </div>

            <!-- PAGE 2: Kolaborator -->
            <div id="page-2" class="form-page hidden">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Kolaborator</h3>
                
                <p class="text-gray-600 mb-4">Tambahkan kolaborator yang terlibat dalam pembuatan merek ini (opsional)</p>

                <!-- Kolaborator Container -->
                <div id="kolaborator-container" class="mb-6">
                    <!-- Kolaborator items akan ditambahkan di sini via JavaScript -->
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

                <!-- Buttons Page 2 -->
                <div class="flex gap-4">
                    <button type="button" onclick="previousPage(1)" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Kembali
                    </button>
                    <button type="button" onclick="saveDraft()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Simpan Draft
                    </button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded transition duration-200">
                        Submit Pengajuan
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

// ======== FUNGSI UNTUK TAMBAH INPUT FILE DOKUMEN DESKRIPSI ========
function addDokumenDeskripsi() {
    const container = document.getElementById('dokumen-deskripsi-container');
    const newItem = document.createElement('div');
    newItem.className = 'dokumen-deskripsi-item mb-2 flex gap-2';
    newItem.innerHTML = `
        <input type="file" name="dokumen_deskripsi[]" accept=".pdf"
            class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-red-500">
        <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 px-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    `;
    container.appendChild(newItem);
}


// ======== FUNGSI UNTUK TAMBAH KOLABORATOR ========
function addKolaborator() {
    const container = document.getElementById('kolaborator-container');
    const newItem = document.createElement('div');
    newItem.className = 'kolaborator-item mb-4 p-4 bg-gray-50 rounded';
    newItem.id = `kolaborator-${kolaboratorCount}`;
    
    newItem.innerHTML = `
        <div class="flex justify-between items-start mb-3">
            <h4 class="font-semibold text-gray-700">Kolaborator ${kolaboratorCount + 1}</h4>
            <button type="button" onclick="removeKolaborator(${kolaboratorCount})" class="text-red-600 hover:text-red-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="relative">
            <label class="block text-gray-700 font-medium mb-2">Cari Pegawai</label>
            <input type="text" 
                onkeyup="searchPegawai(this, ${kolaboratorCount})"
                class="border border-gray-300 rounded w-full py-2 px-3"
                placeholder="Ketik nama pegawai...">

            <ul id="pegawai-result-${kolaboratorCount}" 
                class="absolute z-10 bg-white border w-full rounded shadow mt-1 hidden max-h-60 overflow-y-auto"></ul>

            <input type="hidden" name="kolaborator_ids[]" id="pegawai-id-${kolaboratorCount}">
        </div>
    `;
    
    container.appendChild(newItem);
    kolaboratorCount++;
}

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
    for (let i = 1; i <= 2; i++) {
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
    for (let i = 1; i <= 1; i++) {
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
        // Validate page 1 fields untuk merek
        const judul = document.getElementById('judul').value.trim();
        const uraianWarnaMerek = document.getElementById('uraian_warna_merek').value.trim();
        const artiMerek = document.getElementById('arti_merek').value.trim();
        const kuasaMerek = document.getElementById('kuasa_merek').value.trim();
        const deskripsi = document.getElementById('deskripsi').value.trim();
        const tanggalMerek = document.getElementById('tanggal_merek').value;
        
        if (!judul) {
            alert('Judul Merek harus diisi');
            document.getElementById('judul').focus();
            return false;
        }
        
        if (!uraianWarnaMerek) {
            alert('Uraian Warna Merek harus diisi');
            document.getElementById('uraian_warna_merek').focus();
            return false;
        }
        
        if (!artiMerek) {
            alert('Arti Merek harus diisi');
            document.getElementById('arti_merek').focus();
            return false;
        }

        if (!kuasaMerek) {
            alert('Kuasa Merek harus diisi');
            document.getElementById('kuasa_merek').focus();
            return false;
        }
        
        if (!deskripsi) {
            alert('Deskripsi harus diisi');
            document.getElementById('deskripsi').focus();
            return false;
        }
        
        if (!tanggalMerek) {
            alert('Tanggal Merek harus diisi');
            document.getElementById('tanggal_merek').focus();
            return false;
        }
        
        // Validasi dokumen deskripsi wajib
        const dokumenInputs = document.querySelectorAll('input[name="dokumen_deskripsi[]"]');
        
        let hasFile = false;
        dokumenInputs.forEach(input => {
            if (input.files.length > 0) {
                hasFile = true;
            }
        });

        if (!hasFile) {
            alert('Dokumen Deskripsi (PDF) wajib diupload minimal 1 file');
            return false;   
        }
    }

    return true;
}

function searchPegawai(input, id) {
    const query = input.value;
    const resultBox = document.getElementById(`pegawai-result-${id}`);

    if (query.length < 2) {
        resultBox.classList.add('hidden');
        return;
    }

    fetch(`/pegawai/search?q=${query}`)
        .then(res => res.json())
        .then(data => {
            resultBox.innerHTML = '';
            resultBox.classList.remove('hidden');

            if (data.length === 0) {
                const li = document.createElement('li');
                li.className = 'px-3 py-2 text-gray-500';
                li.innerText = 'Tidak ada hasil';
                resultBox.appendChild(li);
                return;
            }

            data.forEach(p => {
                const li = document.createElement('li');
                li.className = 'px-3 py-2 hover:bg-gray-100 cursor-pointer';
                li.innerText = p.nama;

                li.onclick = () => {
                    input.value = p.nama;
                    document.getElementById(`pegawai-id-${id}`).value = p.id;
                    resultBox.classList.add('hidden');
                };

                resultBox.appendChild(li);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
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
    let formData = new FormData(document.getElementById('multiStepForm'));

    fetch("{{ route('pengajuan.save-draft') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if (res.success) {
            alert('Draft berhasil disimpan!');
            window.location.href = "{{ route('pengajuan.dokumen') }}?usulan_id=" + res.usulan_id;
        } else {
            alert(res.message || 'Gagal menyimpan draft');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan draft');
    });
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
        previousPage(1);
        return true;
    }
});
</script>
@endpush
@endsection