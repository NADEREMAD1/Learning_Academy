<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next,$guard='admin'): Response
    {
       if(!auth()->guard($guard)->check() ){

           return redirect(route('admin.login'));
       }
        // check() => بتشوف هل اليوزر دلوقتي عامل لوج ان ولا لا

        return $next($request);
    }
}
