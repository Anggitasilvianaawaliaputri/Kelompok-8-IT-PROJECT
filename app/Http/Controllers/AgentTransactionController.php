<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use App\Models\Item;
use App\Models\AgentTransaction;
use Illuminate\Http\Request;

class AgentTransactionController extends Controller
{
    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        $agents = Agent::all(); // Ambil semua agen
        $items = Item::with('category')->get(); // Ambil semua item dan kategorinya
        return view('agent_transactions.create', compact('agents', 'items'));
    }

    // Menyimpan transaksi agen ke database
    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id', // Validasi agen
            'item_id' => 'required|exists:items,id',   // Validasi item
            'quantity' => 'required|integer|min:1',    // Validasi jumlah
            'payment_method' => 'required|string',     // Validasi metode pembayaran
        ]);

        $item = Item::find($request->item_id);
        $unitPrice = $item->harga; // Harga satuan diambil dari item
        $totalPrice = $unitPrice * $request->quantity; // Hitung total harga

        AgentTransaction::create([
            'agent_id' => $request->agent_id,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('agent_transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan daftar transaksi agen
    public function index()
    {
        $transactions = AgentTransaction::with(['agent', 'item.category'])->get(); // Ambil semua transaksi dengan relasi
        return view('agent_transactions.index', compact('transactions'));
    }
}

