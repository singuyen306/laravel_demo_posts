<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleAccount
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
        if(!Auth::check() || Auth::user()->role_id != 2 ){
            return redirect()->route('backend_login');
        }
        return $next($request);
    }
}
