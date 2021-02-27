<?php

namespace App\Http\Middleware;

use Closure;

class CheckForInstallation
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

        if (\Setting::get('app_installed')) {
            \App::abort(404);
        }

        return $response;
    }
}
