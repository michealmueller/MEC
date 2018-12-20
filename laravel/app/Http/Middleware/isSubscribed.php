<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isSubscribed
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
        if(Auth::user()->subscribed('prod_EBezTZOsApxwwb') || Auth::user()->subscribed('prod_EBaPJtFVdyzYel')){
            return $next($request);
        }
        session()->put('info', 'You do not have a subscription to cancel.');
        return route('profile');
    }
}
