<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user() === NULL){
            return redirect()->back()->with('error', 'Insufficient Permissions');
        }

        if($request->user()->hasAnyRole($role)){
            return $next($request);
        }
        return redirect()->back()->with('error', 'Insufficient Permissions');
    }
}
