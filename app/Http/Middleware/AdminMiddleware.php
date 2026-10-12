<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user yang login adalah admin
        if (Auth::check() && Auth::user()->email === 'admin@gmail.com') {
            return $next($request);
        }

        // Jika bukan admin, tendang ke dashboard user dengan pesan error/peringatan
        return redirect()->route('user.dashboard')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut!');
    }
}
