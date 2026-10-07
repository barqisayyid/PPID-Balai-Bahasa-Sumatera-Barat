<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Membatasi route berdasarkan peran pengguna.
 * Contoh pemakaian di route: ->middleware('role:admin')
 */
class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$peran): Response
    {
        $user = $request->user();

        abort_unless($user && in_array($user->role, $peran, true), 403, 'Anda tidak memiliki akses ke halaman ini.');

        return $next($request);
    }
}