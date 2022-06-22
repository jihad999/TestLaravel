<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Artisan;


class ClearCahce
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       Artisan::call("route:cache");

        return $next($request);
    }
}
