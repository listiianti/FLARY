<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1. Halaman Landing Page Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. Halaman & Proses Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// 3. Halaman & Proses Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

// 4. Proses Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// RUTE YANG WAJIB LOGIN (MENGGUNAKAN AUTH)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Halaman Beranda Utama (Mengarah ke folder auth/beranda.blade.php)
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    // 🌟 RUTE BARU: Halaman Katalog/Jelajah Buku
    Route::get('/buku', function () {
        return view('buku.index'); 
    })->name('buku.index');

    // RUTE BARU: Halaman Detail Buku
    Route::get('/buku/{id}', function ($id) {
        return view('buku.detail', ['id' => $id]); 
    })->name('buku.detail');

    // RUTE BARU: Proses Kirim Form Pinjam Buku (POST)
    Route::post('/pinjam-buku/{id}', function ($id) {
        return back()->with('success', 'Buku berhasil diajukan untuk dipinjam!');
    })->name('buku.pinjam');

});