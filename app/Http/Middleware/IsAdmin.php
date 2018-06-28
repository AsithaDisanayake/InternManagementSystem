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
        if(auth()->check() && $request->user()->usertype == "admin"){
            return redirect()->guest('home');
    }elseif(auth()->check() && $request->user()->usertype == "user"){
            return redirect()->guest('home');
        }elseif(auth()->check() && $request->user()->usertype == "student"){
            return redirect()->guest('home');
        }elseif(auth()->check() && $request->user()->usertype == "company"){
            return redirect()->guest('home');
        }

        return $next($request);

    }
}
