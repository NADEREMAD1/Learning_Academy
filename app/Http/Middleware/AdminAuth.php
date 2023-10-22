<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next,$guard=null): Response
    {
       if(!auth()->guard($guard)->check() );
        // check() => بتشوف هل اليوزر دلوقتي عامل لوج ان ولا لا
        return redirect(route('admin.login'));
        return $next($request);
    }
}
