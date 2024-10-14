<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Agent;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('agent', 'item.category')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $agents = Agent::all();
        $items = Item::all();
        return view('transactions.create', compact('agents', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        $item = Item::find($request->item_id);
        $total_price = $request->quantity * $request->unit_price;

        Transaction::create([
            'agent_id' => $request->agent_id,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $total_price,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit(Transaction $transaction)
    {
        $agents = Agent::all();
        $items = Item::all();
        return view('transactions.edit', compact('transaction', 'agents', 'items'));
    }
    public function update(Request $request, Transaction $transaction)
    {
        // Validasi data yang diinputkan
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
        ]);
    
        // Update data transaksi di database
        $transaction->update([
            'agent_id' => $request->agent_id,
            'item_id' => $request->item_id,
            'category_id' => $request->category_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $request->jumlah * $request->harga_satuan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
    
        // Arahkan kembali ke halaman index transaksi dengan pesan sukses
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
}
