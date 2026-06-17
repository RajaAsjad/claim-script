<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSitePagesVisible
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('site.home_only')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
