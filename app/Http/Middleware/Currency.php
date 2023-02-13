<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\Helpers\Currency as CurrencyeHelper;

class Currency
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
        CurrencyeHelper::initializeSession();

        return $next($request);
    }
}
