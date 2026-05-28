<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\Buku;
use App\Models\UlasanBuku;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE PEMINJAM
// ==========================================
Route::middleware(['auth', 'role:peminjam'])->group(function () {

    Route::get('/beranda', function () {
        $peminjaman = \App\Models\Peminjaman::with('buku')
                        ->where('id_user', Auth::id())
                        ->where('status', 'dipinjam')
                        ->orderBy('tanggal_kembali', 'asc')
                        ->get();

        $totalRiwayat = \App\Models\Peminjaman::where('id_user', Auth::id())->count();

        $totalDenda = \App\Models\Peminjaman::where('id_user', Auth::id())
                        ->where(function($q) {
                            $q->where(function($q2) {
                                $q2->where('status', 'dipinjam')
                                   ->whereDate('tanggal_kembali', '<', now());
                            })->orWhere('status', 'terlambat');
                        })
                        ->get()
                        ->sum(function($item) {
                            $batasKembali = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                            $tanggalAkhir = $item->tanggal_dikembalikan
                                ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->startOfDay()
                                : \Carbon\Carbon::now()->startOfDay();
                            return (int) $batasKembali->diffInDays($tanggalAkhir) * 5000;
                        });

        return view('beranda', compact('peminjaman', 'totalRiwayat', 'totalDenda'));
    })->name('beranda');

    Route::get('/buku', function () {
        $bukus = Buku::with('kategori')->get();
        return view('buku.index', compact('bukus'));
    })->name('buku.index');

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
        ", [$search . '%', '% ' . $search . '%'])->limit(6);

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

    Route::get('/buku/{id}/pinjam', function ($id) {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('buku.pinjam', compact('buku'));
    })->name('pinjam.form');

    Route::post('/buku/{id}/pinjam', function (Request $request, $id) {
        $request->validate([
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'durasi'         => 'required|integer|in:3,7,14',
        ]);

        $jumlahDipinjam = \App\Models\Peminjaman::where('id_user', Auth::id())
                            ->where('status', 'dipinjam')
                            ->count();

        if ($jumlahDipinjam >= 5) {
            return redirect()->route('buku.show', $id)
                             ->with('error_pinjam', 'Kamu sudah meminjam 5 buku. Kembalikan buku terlebih dahulu sebelum meminjam yang baru.');
        }

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

    Route::get('/buku/{id}', function ($id) {
        $buku = Buku::with(['kategori', 'ulasan.user'])->findOrFail($id);
        return view('buku.show', compact('buku'));
    })->name('buku.show');

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

        return redirect()->route('buku.show', $id)->with('sukses_ulasan', 'Ulasan berhasil dikirim!');
    })->name('ulasan.store');

    Route::get('/koleksi', function () {
        $koleksi = KoleksiPribadi::with('buku.kategori')
                    ->where('id_user', Auth::id())
                    ->get();
        return view('buku.koleksi', compact('koleksi'));
    })->name('buku.koleksi');

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

        return redirect()->route('buku.show', $id)->with('sukses_koleksi', 'Buku berhasil ditambahkan ke koleksi!');
    })->name('koleksi.store');

    Route::delete('/koleksi/{id}', function ($id) {
        KoleksiPribadi::where('id_user', Auth::id())
            ->where('id_buku', $id)
            ->delete();

        return redirect()->route('buku.koleksi')->with('sukses_koleksi', 'Buku berhasil dihapus dari koleksi!');
    })->name('koleksi.destroy');

    Route::get('/riwayat', function () {
        $riwayat = \App\Models\Peminjaman::with('buku')
                    ->where('id_user', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('buku.riwayat', compact('riwayat'));
    })->name('buku.riwayat');

    Route::get('/denda', function () {
        $denda = \App\Models\Peminjaman::with('buku')
                    ->where('id_user', Auth::id())
                    ->where(function($q) {
                        $q->where(function($q2) {
                            $q2->where('status', 'dipinjam')
                               ->whereDate('tanggal_kembali', '<', now());
                        })->orWhere(function($q2) {
                            $q2->where('status', 'terlambat');
                        });
                    })
                    ->get()
                    ->map(function($item) {
                        $batasKembali = \Carbon\Carbon::parse($item->tanggal_kembali);
                        $tanggalAkhir = $item->tanggal_dikembalikan
                            ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)
                            : \Carbon\Carbon::now();
                        $hariTerlambat = (int) $batasKembali->startOfDay()->diffInDays($tanggalAkhir->startOfDay());
                        $item->hari_terlambat = $hariTerlambat;
                        $item->total_denda    = $hariTerlambat * 5000;
                        return $item;
                    });

        $totalDenda = $denda->sum('total_denda');
        return view('buku.denda', compact('denda', 'totalDenda'));
    })->name('buku.denda');

});

// ==========================================
// RUTE PETUGAS
// ==========================================
Route::middleware(['auth', 'role:petugas,admin'])->prefix('petugas')->name('petugas.')->group(function () {

    Route::get('/dashboard', function () {
        $totalBuku      = \App\Models\Buku::count();
        $totalDipinjam  = \App\Models\Peminjaman::where('status', 'dipinjam')->count();
        $totalTerlambat = \App\Models\Peminjaman::where('status', 'dipinjam')
                            ->whereDate('tanggal_kembali', '<', now())->count();
        $totalPengguna  = \App\Models\User::where('role', 'peminjam')->count();

        $peminjaman = \App\Models\Peminjaman::with(['buku', 'user'])->latest()->take(10)->get();

        return view('petugas.dashboard', compact(
            'totalBuku', 'totalDipinjam', 'totalTerlambat', 'totalPengguna', 'peminjaman'
        ));
    })->name('dashboard');

    Route::get('/buku', function () {
        $bukus = \App\Models\Buku::with('kategori')->get();
        return view('petugas.buku.index', compact('bukus'));
    })->name('buku.index');

    // PENTING: create harus di atas {id}
    Route::get('/buku/create', function () {
        $kategoris = \App\Models\KategoriBuku::all();
        return view('petugas.buku.create', compact('kategoris'));
    })->name('buku.create');

    Route::post('/buku', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'judul'       => 'required',
            'penulis'     => 'required',
            'stok'        => 'required|integer|min:0',
            'id_kategori' => 'required',
        ]);
        \App\Models\Buku::create($request->all());
        return redirect()->route('petugas.buku.index')->with('sukses', 'Buku berhasil ditambahkan!');
    })->name('buku.store');

    Route::get('/buku/{id}/edit', function ($id) {
        $buku      = \App\Models\Buku::with('kategori')->findOrFail($id);
        $kategoris = \App\Models\KategoriBuku::all();
        return view('petugas.buku.edit', compact('buku', 'kategoris'));
    })->name('buku.edit');

    Route::put('/buku/{id}', function (\Illuminate\Http\Request $request, $id) {
        $request->validate([
            'judul'       => 'required',
            'penulis'     => 'required',
            'stok'        => 'required|integer|min:0',
            'id_kategori' => 'required',
        ]);
        \App\Models\Buku::findOrFail($id)->update($request->all());
        return redirect()->route('petugas.buku.index')->with('sukses', 'Buku berhasil diupdate!');
    })->name('buku.update');

    Route::delete('/buku/{id}', function ($id) {
        \App\Models\Buku::findOrFail($id)->delete();
        return redirect()->route('petugas.buku.index')->with('sukses', 'Buku berhasil dihapus!');
    })->name('buku.destroy');

    Route::get('/peminjaman', function () {
        $peminjaman = \App\Models\Peminjaman::with(['buku', 'user'])->latest()->get();
        return view('petugas.peminjaman.index', compact('peminjaman'));
    })->name('peminjaman.index');

    Route::patch('/peminjaman/{id}/approve', function ($id) {
        \App\Models\Peminjaman::findOrFail($id)->update(['status' => 'dipinjam']);
        return back()->with('sukses', 'Peminjaman disetujui!');
    })->name('peminjaman.approve');

    Route::patch('/peminjaman/{id}/tolak', function ($id) {
        \App\Models\Peminjaman::findOrFail($id)->update(['status' => 'ditolak']);
        return back()->with('sukses', 'Peminjaman ditolak!');
    })->name('peminjaman.tolak');

    Route::get('/pengembalian', function () {
        $peminjaman = \App\Models\Peminjaman::with(['buku', 'user'])
                        ->where('status', 'dipinjam')
                        ->orderBy('tanggal_kembali', 'asc')
                        ->get();
        return view('petugas.pengembalian.index', compact('peminjaman'));
    })->name('pengembalian.index');

    Route::patch('/pengembalian/{id}', function ($id) {
        $item = \App\Models\Peminjaman::findOrFail($id);
        $batasKembali   = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
        $tanggalKembali = \Carbon\Carbon::now()->startOfDay();
        $hariTerlambat  = (int) $batasKembali->diffInDays($tanggalKembali, false);

        $item->update([
            'status'               => $hariTerlambat > 0 ? 'terlambat' : 'dikembalikan',
            'tanggal_dikembalikan' => now(),
        ]);
        return back()->with('sukses', 'Pengembalian berhasil dicatat!');
    })->name('pengembalian.catat');

    Route::get('/denda', function () {
        $denda = \App\Models\Peminjaman::with(['buku', 'user'])
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('status', 'dipinjam')
                               ->whereDate('tanggal_kembali', '<', now());
                        })->orWhere('status', 'terlambat');
                    })
                    ->get()
                    ->map(function ($item) {
                        $batasKembali  = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                        $tanggalAkhir  = $item->tanggal_dikembalikan
                            ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->startOfDay()
                            : \Carbon\Carbon::now()->startOfDay();
                        $hariTerlambat = (int) $batasKembali->diffInDays($tanggalAkhir);
                        $item->hari_terlambat = $hariTerlambat;
                        $item->total_denda    = $hariTerlambat * 5000;
                        return $item;
                    });

        $totalDenda = $denda->sum('total_denda');
        return view('petugas.denda.index', compact('denda', 'totalDenda'));
    })->name('denda.index');

});

// ==========================================
// RUTE ADMIN
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        $totalBuku      = \App\Models\Buku::count();
        $totalDipinjam  = \App\Models\Peminjaman::where('status', 'dipinjam')->count();
        $totalTerlambat = \App\Models\Peminjaman::where('status', 'dipinjam')
                            ->whereDate('tanggal_kembali', '<', now())->count();
        $totalPengguna  = \App\Models\User::where('role', 'peminjam')->count();
        $totalPetugas   = \App\Models\User::where('role', 'petugas')->count();
        $totalDenda     = \App\Models\Peminjaman::where(function ($q) {
                                $q->where(function ($q2) {
                                    $q2->where('status', 'dipinjam')
                                       ->whereDate('tanggal_kembali', '<', now());
                                })->orWhere('status', 'terlambat');
                            })
                            ->get()
                            ->sum(function ($item) {
                                $batas = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                                $akhir = $item->tanggal_dikembalikan
                                    ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->startOfDay()
                                    : \Carbon\Carbon::now()->startOfDay();
                                return (int) $batas->diffInDays($akhir) * 5000;
                            });

        $peminjaman = \App\Models\Peminjaman::with(['buku', 'user'])->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalBuku', 'totalDipinjam', 'totalTerlambat',
            'totalPengguna', 'totalPetugas', 'totalDenda', 'peminjaman'
        ));
    })->name('dashboard');

    Route::get('/users', function () {
        $users = \App\Models\User::where('role', 'peminjam')->latest()->get();
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    Route::delete('/users/{id}', function ($id) {
        \App\Models\User::findOrFail($id)->delete();
        return back()->with('sukses', 'User berhasil dihapus!');
    })->name('users.destroy');

    Route::get('/petugas', function () {
        $petugas = \App\Models\User::where('role', 'petugas')->latest()->get();
        return view('admin.petugas.index', compact('petugas'));
    })->name('petugas.index');

    Route::get('/petugas/create', function () {
        return view('admin.petugas.create');
    })->name('petugas.create');

    Route::post('/petugas', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'alamat'   => 'required',
        ]);

        \App\Models\User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'alamat'   => $request->alamat,
            'role'     => 'petugas',
        ]);

        return redirect()->route('admin.petugas.index')->with('sukses', 'Petugas berhasil ditambahkan!');
    })->name('petugas.store');

    Route::delete('/petugas/{id}', function ($id) {
        \App\Models\User::findOrFail($id)->delete();
        return back()->with('sukses', 'Petugas berhasil dihapus!');
    })->name('petugas.destroy');

    Route::get('/laporan', function () {
        $peminjaman = \App\Models\Peminjaman::with(['buku', 'user'])
                        ->orderBy('created_at', 'desc')->get();

        $perBulan = \App\Models\Peminjaman::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
                        ->groupBy('bulan')->orderBy('bulan')->get();

        $bukuTerpopuler = \App\Models\Buku::withCount('peminjaman')
                            ->orderBy('peminjaman_count', 'desc')->take(5)->get();

        $totalDenda = \App\Models\Peminjaman::where(function ($q) {
                            $q->where(function ($q2) {
                                $q2->where('status', 'dipinjam')
                                   ->whereDate('tanggal_kembali', '<', now());
                            })->orWhere('status', 'terlambat');
                        })
                        ->get()
                        ->sum(function ($item) {
                            $batas = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                            $akhir = $item->tanggal_dikembalikan
                                ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->startOfDay()
                                : \Carbon\Carbon::now()->startOfDay();
                            return (int) $batas->diffInDays($akhir) * 5000;
                        });

        return view('admin.laporan.index', compact('peminjaman', 'perBulan', 'bukuTerpopuler', 'totalDenda'));
    })->name('laporan.index');

});