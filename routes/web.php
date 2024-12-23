<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema; // Pastikan ini ada
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TransactionController;

Route::get('/Laporan', function() {
    $posts = Laporan::all(); // Ambil semua data transaksi
    return view('Laporan', ['posts' => $posts]); // Kirim data ke view
})->name('laporan'); // Memberikan nama 'laporan' pada rute


Route::get('/editLaporan/{post}', [LaporanController::class, 'showEditScreen'])->name('post.edit');
Route::put('/editLaporan/{post}', [LaporanController::class, 'actuallyUpdatePost'])->name('post.update');

// Route untuk menyimpan data laporan
Route::post('/create-post-laporan', [LaporanController::class, 'createPost'])->name('post.create'); 

// Route untuk menghapus laporan
Route::delete('/deleteLaporan/{post}', [LaporanController::class, 'destroy'])->name('post.destroy');

// Rute untuk memeriksa kolom di tabel accounts
Route::get('/check-accounts', function () {
    return response()->json(Schema::getColumnListing('accounts')); // Mengembalikan kolom dalam format JSON
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('accounts', AccountController::class);
Route::resource('items', ItemController::class);
Route::resource('categories', CategoryController::class);
Route::resource('agents', AgentController::class);
Route::resource('transactions', TransactionController::class);
