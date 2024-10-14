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
