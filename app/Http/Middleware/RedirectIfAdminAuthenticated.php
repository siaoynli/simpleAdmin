<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfAdminAuthenticated
{

    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.home'));
        }

        return $next($request);
    }
}
