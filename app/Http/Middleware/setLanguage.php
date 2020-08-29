<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class setLanguage
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
        if(Session::has('locale'))
        {
            App::setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
