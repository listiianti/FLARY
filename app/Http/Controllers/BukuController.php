<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return response()->json($buku);
    }

    public function show($id)
    {
        $buku = Buku::with(['kategori', 'ulasan.user', 'peminjaman'])->findOrFail($id);
        return response()->json($buku);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok'         => 'required|integer|min:0',
            'deskripsi'    => 'nullable|string',
            'id_kategori'  => 'nullable|array',
            'id_kategori.*'=> 'exists:kategoribuku,id',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('buku', 'public');
        }

        $buku = Buku::create($validated);

        if (!empty($validated['id_kategori'])) {
            $buku->kategori()->sync($validated['id_kategori']);
        }

        return response()->json($buku->load('kategori'), 201);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'judul'        => 'sometimes|string|max:255',
            'penulis'      => 'sometimes|string|max:255',
            'penerbit'     => 'sometimes|string|max:255',
            'tahun_terbit' => 'sometimes|integer',
            'stok'         => 'sometimes|integer|min:0',
            'deskripsi'    => 'nullable|string',
            'id_kategori'  => 'nullable|array',
            'id_kategori.*'=> 'exists:kategoribuku,id',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($buku->gambar) {
                Storage::disk('public')->delete($buku->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('buku', 'public');
        }

        $buku->update($validated);

        if (isset($validated['id_kategori'])) {
            $buku->kategori()->sync($validated['id_kategori']);
        }

        return response()->json($buku->load('kategori'));
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }

        $buku->kategori()->detach();
        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
}