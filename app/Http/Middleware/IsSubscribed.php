<?php

namespace App\Http\Middleware;

use Closure;

class IsSubscribed
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
         if ($request->user() && ! $request->user()->subscribed('default')) {
             return abort(403);
         }

         return $next($request);
     }
}
