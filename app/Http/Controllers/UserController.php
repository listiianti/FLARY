<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Hanya admin yang bisa melihat semua user
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $users = User::select('id', 'name', 'email', 'username', 'alamat', 'role', 'created_at')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        if (Auth::user()->role !== 'admin' && Auth::id() !== (int) $id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user = User::select('id', 'name', 'email', 'username', 'alamat', 'role', 'created_at')
            ->findOrFail($id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin' && Auth::id() !== (int) $id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:users,email,' . $id,
            'username' => 'sometimes|string|max:255|unique:users,username,' . $id,
            'alamat'   => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
            'role'     => 'sometimes|in:admin,user',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Hanya admin yang bisa mengubah role
        if (Auth::user()->role !== 'admin') {
            unset($validated['role']);
        }

        $user->update($validated);

        return response()->json($user->fresh(['id', 'name', 'email', 'username', 'alamat', 'role']));
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus']);
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json($user);
    }
}