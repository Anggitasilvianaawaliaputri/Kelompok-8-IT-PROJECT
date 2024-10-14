<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade'); // Nama agen
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');   // Nama barang
            $table->integer('quantity');   // Jumlah barang
            $table->decimal('unit_price', 10, 2); // Harga satuan
            $table->decimal('total_price', 10, 2); // Total harga
            $table->string('payment_method'); // Metode pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
