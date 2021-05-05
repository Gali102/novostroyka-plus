<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->is_admin)
        {

            return $next($request);
        
        } elseif(Auth::check() && Auth::user()->manager) {
        
            return $next($request);
        
        }

        abort(404);

    }
}
