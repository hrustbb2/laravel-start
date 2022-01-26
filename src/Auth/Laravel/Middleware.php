<?php

namespace Src\Auth\Laravel;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Middleware {

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(!Auth::user()){
            return redirect()->route('home');
        }
        return $next($request);
    }

}