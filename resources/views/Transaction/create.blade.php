@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="agent_id" class="form-label">Nama Agen</label>
            <select class="form-control" id="agent_id" name="agent_id" required>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="item_id" class="form-label">Nama Barang</label>
            <select class="form-control" id="item_id" name="item_id" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Harga Satuan</label>
            <input type="number" class="form-control" id="unit_price" name="unit_price" required>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <input type="text" class="form-control" id="payment_method" name="payment_method" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection