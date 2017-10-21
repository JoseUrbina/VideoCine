<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            switch (Auth::user()->rol) {
                case 'A':
                    return redirect('/admin/dashadmin');
                    break;
                case 'C':
                    return redirect('/home');
                    break;
            }
        }

        return $next($request);
    }
}
