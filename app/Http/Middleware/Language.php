<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\Helpers\Language as LanguageHelper;

class Language
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
        App::setLocale(LanguageHelper::getSession());
        
        return $next($request);
    }
}
