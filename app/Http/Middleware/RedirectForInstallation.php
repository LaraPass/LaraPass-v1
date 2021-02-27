<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectForInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (setting()->get('app_installed') == 0) {
            return redirect('/admin/install');
        } else {
            return $response;
        }
    }
}
