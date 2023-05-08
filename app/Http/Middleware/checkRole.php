<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && auth()->user()->role !== 'admin'){
            abort(403, "ANDA BUKAN ADMIN");
            return redirect('/admin-dashboard');
        }

        elseif (Auth::check() && auth()->user()->role !== 'user'){
            abort(403, "ANDA BUKAN PELAMAR");
            return redirect('/main');
        }
        return $next($request);
    }
}
