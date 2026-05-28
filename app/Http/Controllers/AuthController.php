<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'petugas') {
                return redirect('/petugas/dashboard');
            }

            return redirect()->intended('/beranda');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|confirmed',
            'alamat'   => 'required'
        ]);

        User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat'   => $request->alamat,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login menggunakan akun Anda.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}