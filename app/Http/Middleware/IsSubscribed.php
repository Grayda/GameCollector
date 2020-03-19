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
        if($request->user()) {
          if($request->user()->is_admin) {
            return $next($request);
          } elseif(!$request->user()->subscribed('default')) {
            return redirect('/subscription/subscribe');
          } else {
            return $next($request);
          }
        } else {
          return route('login');
        }
     }
}
