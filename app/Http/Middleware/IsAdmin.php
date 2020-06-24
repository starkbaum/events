<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        //TODO change to foreign key role_id in database and make database table roles
        if(auth()->user()->role === 1) {
            return $next($request);
        }

        abort(404);
    }
}
