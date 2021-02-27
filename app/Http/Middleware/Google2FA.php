<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Google2FA
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ((Auth::user()->two_step == 1) && (!$request->session()->has('2fa'))) {
            return response()->view('auth.authenticate');
        }

        return $response;
    }
}
