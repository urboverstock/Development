<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        //echo Auth::user()->user_type;die;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (!Auth::guest() && Auth::user()->user_type == 4) {
                    return redirect()->route('buyer.index');
                }else if (!Auth::guest() && Auth::user()->user_type == 1) {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('sellerDashboard');
                }
                //return redirect()->route('sellerDashboard');
            }
        }

        return $next($request);
    }
}
