<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->when(Auth::user()->role !== 'admin', function ($q) {
                $q->where('id_user', Auth::id());
            })
            ->latest()
            ->get();

        return response()->json($peminjaman);
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);

        if (Auth::user()->role !== 'admin' && $peminjaman->id_user !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($peminjaman);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku'         => 'required|exists:buku,id',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $buku = Buku::findOrFail($validated['id_buku']);

        if ($buku->stok < 1) {
            return response()->json(['message' => 'Stok buku tidak tersedia'], 422);
        }

        $peminjaman = Peminjaman::create([
            'id_user'         => Auth::id(),
            'id_buku'         => $validated['id_buku'],
            'tanggal_pinjam'  => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'status'          => 'dipinjam',
        ]);

        $buku->decrement('stok');

        return response()->json($peminjaman->load(['user', 'buku']), 201);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $validated = $request->validate([
            'tanggal_kembali' => 'sometimes|date|after:tanggal_pinjam',
            'status'          => 'sometimes|in:dipinjam,dikembalikan,terlambat',
        ]);

        // Kembalikan stok jika status berubah menjadi dikembalikan
        if (
            isset($validated['status']) &&
            $validated['status'] === 'dikembalikan' &&
            $peminjaman->status !== 'dikembalikan'
        ) {
            $peminjaman->buku->increment('stok');
        }

        $peminjaman->update($validated);

        return response()->json($peminjaman->load(['user', 'buku']));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status === 'dipinjam') {
            $peminjaman->buku->increment('stok');
        }

        $peminjaman->delete();

        return response()->json(['message' => 'Data peminjaman berhasil dihapus']);
    }
}