<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!in_array(auth()->user()->role, $roles)) {
            // Kalau role tidak sesuai, redirect ke halaman masing-masing
            $role = auth()->user()->role;

            if ($role === 'admin') return redirect('/admin/dashboard');
            if ($role === 'petugas') return redirect('/petugas/dashboard');
            return redirect('/beranda');
        }

        return $next($request);
    }
}