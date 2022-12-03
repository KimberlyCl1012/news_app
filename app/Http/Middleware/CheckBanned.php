<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
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
        if (auth()->user()->status ==0) {
            auth()->logout();
            $message = 'Tu cuenta ha sido suspendida. Comuníquese con el administrador.';
            return redirect('/')->with('error', $message);
        }

        return $next($request);
    }
}
