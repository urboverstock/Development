<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SellerStore;

class CheckSellerStoreDetail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::check())
        {
            $user_id = \Auth::user()->id;
            $check = SellerStore::where('user_id', $user_id)
                        ->whereNull('name')
                        ->orWhereNull('description')
                        ->orWhereNull('address')
                        ->first();

            if($check)
            {
                //die('here');
                return redirect('seller/add-store');
            }
        }

        return $next($request);
    }
}
