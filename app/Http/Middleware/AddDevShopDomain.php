<?php

namespace App\Http\Middleware;

use Closure;

class AddDevShopDomain
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
        if (!empty(env('SHOPIFY_DEV_SHOP'))) {
            $request->headers->set('X-Shop-Domain', env('SHOPIFY_DEV_SHOP'));
        }
        return $next($request);
    }
}
