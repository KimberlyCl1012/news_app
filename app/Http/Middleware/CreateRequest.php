<?php

namespace App\Http\Middleware;

use Closure;

class CreateRequest
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
        if($request->user()->status != 1){
			return back();
            //abort(403);
		}
		return $next($request);
    }
}
