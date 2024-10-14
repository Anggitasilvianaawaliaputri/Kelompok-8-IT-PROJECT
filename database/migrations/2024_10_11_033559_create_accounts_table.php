<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            // Menambahkan kolom 'nama' jika belum ada
            $table->string('nama')->after('id');
            
            // Menambahkan kolom 'password' dengan panjang 255 karakter untuk menyimpan password yang di-hash
            $table->string('password', 255)->after('email')->nullable(); // nullable untuk data lama
            
            // Menambahkan kolom 'jabatan' dengan default 'karyawan'
            $table->enum('jabatan', ['admin', 'pemilik', 'karyawan'])->after('password')->default('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            // Menghapus kolom 'nama'
            $table->dropColumn('nama');
            
            // Menghapus kolom 'password'
            $table->dropColumn('password');
            
            // Menghapus kolom 'jabatan'
            $table->dropColumn('jabatan');
        });
    }
};
