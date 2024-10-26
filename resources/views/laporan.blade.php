@extends('layouts.app')  <!-- Gunakan layout umum jika ada -->

@section('content') <!-- Memulai bagian konten dari halaman -->
<div class="container">
    <div class="header mb-4">
        <center><h1>Data Laporan Karyawan</h1></center> <!-- Judul halaman -->
    </div>

    <!-- Tombol untuk menambah laporan baru yang memicu modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalLaporan">
        <i class="fas fa-plus-circle"></i> Tambah Laporan
    </button>

    <!-- Modal untuk menambah laporan -->
    <div class="modal fade" id="modalLaporan" tabindex="-1" aria-labelledby="modalLaporanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLaporanLabel">Form Laporan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
                </div>
                <div class="modal-body">
                    <!-- Form untuk input laporan baru -->
                    <form action="{{ route('post.create') }}" method="POST">
                        @csrf <!-- Token CSRF untuk keamanan -->
                        <div class="mb-3">
                            <label for="nama_karyawan" class="form-label">Nama Karyawan:</label>
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required> <!-- Input untuk nama karyawan -->
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required> <!-- Input untuk tanggal laporan -->
                        </div>
                        <div class="mb-3">
                            <label for="pendapatan" class="form-label">Pendapatan:</label>
                            <input type="number" class="form-control" id="pendapatan" name="pendapatan" required> <!-- Input untuk pendapatan karyawan -->
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button> <!-- Tombol untuk menyimpan laporan -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel untuk menampilkan laporan -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th> <!-- Nomor urut -->
                <th>Nama Karyawan</th> <!-- Nama karyawan -->
                <th>Tanggal</th> <!-- Tanggal laporan -->
                <th>Pendapatan</th> <!-- Pendapatan karyawan -->
                <th>Aksi</th> <!-- Aksi edit dan hapus -->
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $key => $laporan) <!-- Looping untuk setiap laporan -->
            <tr>
                <td>{{ $key + 1 }}</td> <!-- Nomor urut laporan -->
                <td>{{ $laporan->nama_karyawan }}</td> <!-- Menampilkan nama karyawan -->
                <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d F Y') }}</td> <!-- Menampilkan tanggal dengan format yang sesuai -->
                <td>Rp {{ number_format($laporan->pendapatan, 0, ',', '.') }}</td> <!-- Menampilkan pendapatan dengan format mata uang -->
                <td>
                    <!-- Tombol untuk mengedit laporan -->
                    <a href="{{ route('post.edit', $laporan->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <!-- Form untuk menghapus laporan -->
                    <form action="{{ route('post.destroy', $laporan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE') <!-- Menggunakan metode DELETE untuk menghapus data -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')"> <!-- Konfirmasi sebelum hapus -->
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Menyertakan Bootstrap JS untuk fungsi modal -->
@endsection
