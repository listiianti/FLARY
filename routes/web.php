<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Buku; // 🌟 1. WAJIB TAMBAHKAN INI agar Laravel tahu kita mau ambil data Buku

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
// Catatan: Di blade Jelajah Buku kita pakai Link biasa, jadi ganti ke GET agar tidak error saat diklik tombol keluar
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// RUTE YANG WAJIB LOGIN (MENGGUNAKAN AUTH)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Halaman Beranda Utama (Mengarah ke folder auth/beranda.blade.php)
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    // 🌟 RUTE BARU: Halaman Katalog/Jelajah Buku (SUDAH DIPERBAIKI)
    Route::get('/buku', function () {
        $bukus = Buku::all(); // 🌟 2. Ambil semua data buku dari database/seeder
        
        // 🌟 3. Lempar variabel $bukus ke dalam halaman Blade
        return view('buku.index', compact('bukus')); 
    })->name('buku.index');

});