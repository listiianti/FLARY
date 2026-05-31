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

        $userRole = trim(auth()->user()->role); // tambah trim()

        if (!in_array($userRole, $roles)) {
            match($userRole) {
                'admin'    => redirect('/admin/dashboard')->send(),
                'petugas'  => redirect('/petugas/dashboard')->send(),
                'peminjam' => redirect('/beranda')->send(),
                default    => abort(403),
            };
            exit;
        }

        return $next($request);
    }
}