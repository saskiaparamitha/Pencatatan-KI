<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penggajian Usulan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-teal-500 min-h-screen p-6">

    <div class="max-w-2xl mx-auto bg-gray-100 rounded-lg shadow-lg">
        
        <!-- Header Navigation -->
        <div class="bg-white border-b border-gray-300 rounded-t-lg">
            <div class="flex">
                <button class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border-b-2 border-teal-500">
                    Nama Aplikasi
                </button>
                <button class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800">
                    Narasi
                </button>
                <button class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800">
                    Penggajian
                </button>
                <button class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800">
                    Panduan
                </button>
                <div class="ml-auto px-6 py-3">
                    <button class="text-sm text-teal-600 hover:text-teal-800">
                        Hallo, Pengguna!
                    </button>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <div class="bg-white rounded-lg p-6 mb-6">
                <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-gray-800 mb-1 inline-block hover:text-teal-600">
                    ← Kembali
                </a>
                <h3 class="text-xl font-bold text-gray-900 mb-6">Form Penggajian Usulan</h3>

                <form method="POST" action="{{ route('penggajian.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Hidden field untuk jenis -->
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">

                    <!-- Judul Karya -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Karya <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="judul_karya" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Jenis Kekayaan Intelektual -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kekayaan Intelektual <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="jenis_ki" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        >
                            <option value="">Pilih</option>
                            <option value="hak_cipta">Hak Cipta</option>
                            <option value="paten">Paten</option>
                            <option value="merek">Merek</option>
                            <option value="desain_industri">Desain Industri</option>
                            <option value="rahasia_dagang">Rahasia Dagang</option>
                        </select>
                    </div>

                    <!-- Jenis Kekayaan Intelektual 2 -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kekayaan Intelektual <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="jenis_ki_2" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        >
                            <option value="">Pilih</option>
                            <option value="seni">Seni</option>
                            <option value="sastra">Sastra</option>
                            <option value="musik">Musik</option>
                            <option value="film">Film</option>
                            <option value="program_komputer">Program Komputer</option>
                        </select>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Singkat <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="deskripsi" 
                            rows="6" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent resize-none"
                        ></textarea>
                    </div>

                    <!-- Tanggal Pembuatan -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Pembuatan <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="date" 
                            name="tanggal_pembuatan" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Dokumen Usulan -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Dokumen Usulan <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center gap-2">
                            <button 
                                type="button"
                                onclick="document.getElementById('file-upload').click()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded-md hover:bg-gray-300 transition"
                            >
                                +
                            </button>
                            <input 
                                type="file" 
                                id="file-upload"
                                name="dokumen" 
                                required
                                class="hidden"
                                onchange="updateFileName(this)"
                            >
                            <span id="file-name" class="text-sm text-gray-600">Upload File</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button 
                            type="submit"
                            class="px-8 py-2 bg-gray-400 text-white text-sm rounded-md hover:bg-gray-500 transition"
                        >
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'Upload File';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>

</body>
</html>