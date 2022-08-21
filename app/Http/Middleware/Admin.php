<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // modified by abu Oubaida(Dev) for admin middleware
        // step-6:
        if (!Auth::guard('admin')->check())
        {
            return redirect('/admin/login');
        }
        // next-> step-7: go to web.php (routes/web.php)
        return $next($request);
    }
}
