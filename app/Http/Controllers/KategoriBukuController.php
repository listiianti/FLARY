<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategori = KategoriBuku::withCount('buku')->get();
        return response()->json($kategori);
    }

    public function show($id)
    {
        $kategori = KategoriBuku::with('buku')->findOrFail($id);
        return response()->json($kategori);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoribuku,nama_kategori',
        ]);

        $kategori = KategoriBuku::create($validated);

        return response()->json($kategori, 201);
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBuku::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoribuku,nama_kategori,' . $id,
        ]);

        $kategori->update($validated);

        return response()->json($kategori);
    }

    public function destroy($id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->buku()->detach();
        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}