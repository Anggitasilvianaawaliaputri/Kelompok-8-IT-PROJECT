@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Laporan</h1>
    
    <!-- Tampilkan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk mengedit laporan -->
    <form action="{{ route('post.update', $laporan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
            <input 
                type="text" 
                name="nama_karyawan" 
                id="nama_karyawan" 
                class="form-control" 
                value="{{ old('nama_karyawan', $laporan->nama_karyawan) }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input 
                type="date" 
                name="tanggal" 
                id="tanggal" 
                class="form-control" 
                value="{{ old('tanggal', $laporan->tanggal) }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="pendapatan" class="form-label">Pendapatan</label>
            <input 
                type="number" 
                name="pendapatan" 
                id="pendapatan" 
                class="form-control" 
                value="{{ old('pendapatan', $laporan->pendapatan) }}" 
                step="0.01" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('laporan') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
