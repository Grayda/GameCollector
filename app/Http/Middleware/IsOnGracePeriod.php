<?php

namespace App\Http\Middleware;

use Closure;

class IsOnGracePeriod
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
        if($request->user()->subscription()) { // If we are subscribed
          if(!$request->user()->subscription()->onGracePeriod()) { // If we are NOT on our grace period
            return abort(403); // Abort.
          } else {
            return $next($request);
          } // If we are NOT on our grace period
        } else {
          return abort(403); // Abort.
        } // If we are subscribed
     }
}
