<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('formLogin')->with('error', 'Anda tidak memiliki akses untuk halaman yang di minta.');
        }

        return $next($request);
    }
}
