<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoneypotCheck
{
    /**
     * Field ini sengaja disembunyikan dari pengguna normal via CSS.
     * Bot biasanya mengisi semua field yang ada — kalau terisi, tolak diam-diam.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika honeypot field terisi → kemungkinan bot
        if ($request->filled('_confirm_email')) {
            // Beri respons "sukses" palsu agar bot tidak tahu ia terdeteksi
            return $this->fakeSuccess($request);
        }

        return $next($request);
    }

    protected function fakeSuccess(Request $request): Response
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Formulir berhasil dikirim. Kami akan menghubungi Anda segera.',
            ]);
        }

        return redirect()->back()->with('success', 'Formulir berhasil dikirim.');
    }
}