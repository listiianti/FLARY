<?php

namespace App\Http\Controllers;

use App\Models\UlasanBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanBukuController extends Controller
{
    public function index(Request $request)
    {
        $ulasan = UlasanBuku::with(['user', 'buku'])
            ->when($request->id_buku, fn($q) => $q->where('id_buku', $request->id_buku))
            ->latest()
            ->get();

        return response()->json($ulasan);
    }

    public function show($id)
    {
        $ulasan = UlasanBuku::with(['user', 'buku'])->findOrFail($id);
        return response()->json($ulasan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'required|exists:buku,id',
            'ulasan'  => 'required|string|max:1000',
            'rating'  => 'required|integer|min:1|max:5',
        ]);

        $exists = UlasanBuku::where('id_user', Auth::id())
            ->where('id_buku', $validated['id_buku'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Anda sudah memberikan ulasan untuk buku ini'], 409);
        }

        $ulasan = UlasanBuku::create([
            'id_user' => Auth::id(),
            'id_buku' => $validated['id_buku'],
            'ulasan'  => $validated['ulasan'],
            'rating'  => $validated['rating'],
        ]);

        return response()->json($ulasan->load(['user', 'buku']), 201);
    }

    public function update(Request $request, $id)
    {
        $ulasan = UlasanBuku::findOrFail($id);

        if ($ulasan->id_user !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'ulasan' => 'sometimes|string|max:1000',
            'rating' => 'sometimes|integer|min:1|max:5',
        ]);

        $ulasan->update($validated);

        return response()->json($ulasan->load(['user', 'buku']));
    }

    public function destroy($id)
    {
        $ulasan = UlasanBuku::findOrFail($id);

        if ($ulasan->id_user !== Auth::id() && Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $ulasan->delete();

        return response()->json(['message' => 'Ulasan berhasil dihapus']);
    }
}