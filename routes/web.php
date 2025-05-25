<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('index');
});

Route::get('tambah-barang', function () {
    return view('tambahBarang');
});

// Tampilkan daftar barang
Route::get('/', [BarangController::class, 'index'])->name('barang.index');

// Pindah ke halaman tambah barang
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

// Simpan data barang baru
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

// Tampilkan form edit barang berdasarkan ID
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');

// Update data barang berdasarkan ID
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

// Tampilkan halaman hapus barang berdasarkan ID  
Route::get('/barang/delete/{id}', [BarangController::class, 'hapus'])->name('barang.hapus');

// Hapus barang berdasarkan ID  
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

// (Opsional) Tampilkan satu barang saja
Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');

