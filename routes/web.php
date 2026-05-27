<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Buku; // 🌟 1. WAJIB TAMBAHKAN INI agar Laravel tahu kita mau ambil data Buku
use Illuminate\Http\Request; // 🌟 TAMBAHKAN INI untuk menangkap data request dari search bar

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

    // 🌟 RUTE 1: Tampilan Utama Halaman Katalog/Jelajah Buku (Hanya diakses pertama kali lewat browser)
    Route::get('/buku', function () {
        $bukus = Buku::with('kategori')->get(); // Ambil semua data buku beserta kategorinya
        return view('buku.index', compact('bukus')); 
    })->name('buku.index');

    // 🌟 RUTE 2: Khusus Melayani Search Bar & Filter AJAX (Anti-Mirror / Anti-Double Layout)
    Route::get('/buku/search', function (Request $request) {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $query = Buku::query()->with('kategori');

        // Saring kata kunci teks
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('pengarang', 'like', "%{$search}%"); // Sesuaikan jika nama kolomnya 'penulis'
            });
        }

        // Saring tombol kategori
        if ($kategori) {
            $query->whereHas('kategori', function($q) use ($kategori) {
                $q->where('nama_kategori', 'like', "%{$kategori}%");
            });
        }

        $bukus = $query->get();

        // Kembalikan HANYA potongan list kartu buku saja tanpa membawa layout induk/sidebar!
        return view('buku._list', compact('bukus'));
    })->name('buku.search');

    Route::get('/riwayat', function () {
        return view('buku.riwayat'); 
    })->name('buku.riwayat');

    // Koleksi aku
    Route::get('/koleksi', function () {
        return view('buku.koleksi');
    })->name('buku.koleksi');

});