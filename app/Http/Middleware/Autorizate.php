<?php

namespace App\Http\Middleware;

use Closure;

class Autorizate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if(auth()->user()->admin == 0){
			return back();
            //abort(403);
		}
		return $next($request);
    }
}
