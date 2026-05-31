<?php

namespace App\Http\Controllers;

use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiPribadiController extends Controller
{
    public function index()
    {
        $koleksi = KoleksiPribadi::with('buku.kategori')
            ->where('id_user', Auth::id())
            ->get();

        return view('koleksi', compact('koleksi'));
    }

    public function show($id)
    {
        $koleksi = KoleksiPribadi::with('buku.kategori')
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        return response()->json($koleksi);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'required|exists:buku,id',
        ]);

        $exists = KoleksiPribadi::where('id_user', Auth::id())
            ->where('id_buku', $validated['id_buku'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Buku sudah ada di koleksi'], 409);
        }

        $koleksi = KoleksiPribadi::create([
            'id_user' => Auth::id(),
            'id_buku' => $validated['id_buku'],
        ]);

        return response()->json($koleksi->load('buku'), 201);
    }

    public function destroy($id)
    {
        $koleksi = KoleksiPribadi::where('id_user', Auth::id())
            ->where('id_buku', $id)
            ->firstOrFail();

        $koleksi->delete();

        return redirect()->route('koleksi.index')
            ->with('sukses_koleksi', 'Buku berhasil dihapus dari koleksi.');
    }
}