@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Transaksi Pembelian</h1>

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Agen</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->agent->nama }}</td>
                <td>{{ $transaction->item->nama_barang }}</td>
                <td>{{ $transaction->category->name }}</td>
                <td>{{ $transaction->jumlah }}</td>
                <td>Rp {{ number_format($transaction->harga_satuan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                <td>{{ ucfirst($transaction->metode_pembayaran) }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                    <!-- Tombol Hapus (optional) -->
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
