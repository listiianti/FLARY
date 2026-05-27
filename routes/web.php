<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\Buku;
use App\Models\UlasanBuku;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE YANG WAJIB LOGIN (MENGGUNAKAN AUTH)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Beranda
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    // Daftar semua buku
    Route::get('/buku', function () {
        $bukus = Buku::with('kategori')->get();
        return view('buku.index', compact('bukus'));
    })->name('buku.index');

    // Search & filter buku (AJAX)
    Route::get('/buku/search', function (Request $request) {
        $search   = $request->input('search');
        $kategori = $request->input('kategori');

        $query = Buku::query()->with('kategori');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%");
            });
        }

        if ($kategori) {
            $query->whereHas('kategori', function ($q) use ($kategori) {
                $q->where('nama_kategori', $kategori);
            });
        }

        if ($search) {
            $query->orderByRaw("CASE WHEN judul LIKE ? THEN 0 ELSE 1 END", [$search . '%']);
        }

        $bukus = $query->get();

        return view('buku._list', compact('bukus'));
    })->name('buku.search');

    // Autocomplete suggestions
    Route::get('/buku/suggestions', function (Request $request) {
        $search   = $request->input('search');
        $kategori = $request->input('kategori');

        if (!$search) return response()->json([]);

        $query = Buku::query()->with('kategori');

        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "{$search}%")
              ->orWhere('judul', 'like', "% {$search}%")
              ->orWhere('penulis', 'like', "{$search}%");
        });

        if ($kategori) {
            $query->whereHas('kategori', function ($q) use ($kategori) {
                $q->where('nama_kategori', $kategori);
            });
        }

        $query->orderByRaw("
            CASE
                WHEN judul LIKE ? THEN 0
                WHEN judul LIKE ? THEN 1
                ELSE 2
            END
        ", [$search . '%', '% ' . $search . '%'])
        ->limit(6);

        $bukus = $query->get()->map(function ($b) {
            return [
                'id'       => $b->id,
                'judul'    => $b->judul,
                'penulis'  => $b->penulis,
                'kategori' => $b->kategori->first()->nama_kategori ?? 'Umum',
            ];
        });

        return response()->json($bukus);
    })->name('buku.suggestions');

    // ── Halaman form pinjam (HARUS di atas /buku/{id}) ──
    Route::get('/buku/{id}/pinjam', function ($id) {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('buku.pinjam', compact('buku'));
    })->name('pinjam.form');

    // Proses simpan pinjam
    Route::post('/buku/{id}/pinjam', function (Request $request, $id) {
        $request->validate([
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'durasi'         => 'required|integer|in:3,7,14',
        ]);

        $tanggalKembali = \Carbon\Carbon::parse($request->tanggal_pinjam)
                            ->addDays((int) $request->durasi)
                            ->format('Y-m-d');

        \App\Models\Peminjaman::create([
            'id_user'         => Auth::id(),
            'id_buku'         => $id,
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $tanggalKembali,
            'status'          => 'dipinjam',
        ]);

        return redirect()->route('buku.show', $id)
                         ->with('sukses_pinjam', 'Buku berhasil dipinjam! Kembalikan sebelum ' . \Carbon\Carbon::parse($tanggalKembali)->translatedFormat('d F Y') . '.');
    })->name('pinjam.store');

    // Detail buku
    Route::get('/buku/{id}', function ($id) {
        $buku = Buku::with(['kategori', 'ulasan.user'])->findOrFail($id);
        return view('buku.show', compact('buku'));
    })->name('buku.show');

    // Simpan ulasan
    Route::post('/buku/{id}/ulasan', function (Request $request, $id) {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|min:5',
        ]);

        UlasanBuku::create([
            'id_user' => Auth::id(),
            'id_buku' => $id,
            'rating'  => $request->rating,
            'ulasan'  => $request->ulasan,
        ]);

        return redirect()->route('buku.show', $id)
                         ->with('sukses_ulasan', 'Ulasan berhasil dikirim!');
    })->name('ulasan.store');

    // Koleksi saya
    Route::get('/koleksi', function () {
        $koleksi = KoleksiPribadi::with('buku.kategori')
                    ->where('id_user', Auth::id())
                    ->get();
        return view('buku.koleksi', compact('koleksi'));
    })->name('buku.koleksi');

    // Tambah koleksi
    Route::post('/koleksi/{id}', function ($id) {
        $sudahAda = KoleksiPribadi::where('id_user', Auth::id())
                    ->where('id_buku', $id)
                    ->exists();

        if ($sudahAda) {
            return redirect()->route('buku.show', $id)
                             ->with('error_koleksi', 'Buku sudah ada di koleksi kamu!');
        }

        KoleksiPribadi::create([
            'id_user' => Auth::id(),
            'id_buku' => $id,
        ]);

        return redirect()->route('buku.show', $id)
                         ->with('sukses_koleksi', 'Buku berhasil ditambahkan ke koleksi!');
    })->name('koleksi.store');

    // Hapus koleksi
    Route::delete('/koleksi/{id}', function ($id) {
        KoleksiPribadi::where('id_user', Auth::id())
            ->where('id_buku', $id)
            ->delete();

        return redirect()->route('buku.koleksi')
                         ->with('sukses_koleksi', 'Buku berhasil dihapus dari koleksi!');
    })->name('koleksi.destroy');

    // Riwayat pinjam
    Route::get('/riwayat', function () {
        return view('buku.riwayat');
    })->name('buku.riwayat');

});