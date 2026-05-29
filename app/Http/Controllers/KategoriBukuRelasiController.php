<?php

namespace App\Http\Controllers;

use App\Models\KategoriBukuRelasi;
use Illuminate\Http\Request;

class KategoriBukuRelasiController extends Controller
{
    public function index()
    {
        $relasi = KategoriBukuRelasi::with(['buku', 'kategori'])->get();
        return response()->json($relasi);
    }

    public function show($id)
    {
        $relasi = KategoriBukuRelasi::with(['buku', 'kategori'])->findOrFail($id);
        return response()->json($relasi);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku'     => 'required|exists:buku,id',
            'id_kategori' => 'required|exists:kategoribuku,id',
        ]);

        $exists = KategoriBukuRelasi::where('id_buku', $validated['id_buku'])
            ->where('id_kategori', $validated['id_kategori'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Relasi sudah ada'], 409);
        }

        $relasi = KategoriBukuRelasi::create($validated);

        return response()->json($relasi->load(['buku', 'kategori']), 201);
    }

    public function destroy($id)
    {
        $relasi = KategoriBukuRelasi::findOrFail($id);
        $relasi->delete();

        return response()->json(['message' => 'Relasi berhasil dihapus']);
    }
}