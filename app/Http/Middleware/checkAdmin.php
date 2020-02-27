<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $roles = auth()->user()->roles;
//        if ($roles == 0 || $roles == 1)
            return $next($request);
//        else
//            return abort(404);
    }
}
