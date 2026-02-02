@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Pengajuan Paten</h1>

<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf

    <input type="text" name="judul"
           class="border p-2 w-full mb-4"
           placeholder="Judul Desain TLST">

    <button class="bg-red-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
@endsection
