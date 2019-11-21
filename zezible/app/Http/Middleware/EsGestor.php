<?php

namespace App\Http\Middleware;
use Closure;

class EsGestor
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
        //return $next($request);
        if (! $request->user()->esGestor()) {
        //return true;
            abort(403, "No tienes autorización para ingresar.");
    }
       return $next($request);


    }
}
