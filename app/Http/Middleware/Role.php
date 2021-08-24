<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$grupos)
    {
        $user = Auth::user();
        $grupo = $user->grupo;
        if($grupo->nombre == $grupos){
            return $next($request);
        }else {
            if ($grupos == "all") {
                return $next($request);
            }
        }
        return redirect()->route('/');
    }
}
