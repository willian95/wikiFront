<?php

namespace App\Http\Middleware;

use Closure;

class InstitutionMiddleware
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

        if(\Auth::check() && \Auth::user()->role_id != 3){
            return redirect()->back();
        }

        return $next($request);
    }
}
