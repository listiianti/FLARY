<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            // JIKA BERHASIL: Langsung diarahkan ke halaman beranda
            return redirect()->intended('/beranda');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required'
        ]);

        // Membuat user baru di database
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
        ]);

        // JIKA BERHASIL: Langsung diarahkan ke halaman login (sesuai request)
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login menggunakan akun Anda.');
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}