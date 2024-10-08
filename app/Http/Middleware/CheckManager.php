<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !in_array($request->ip(), explode(',', env('ALLOWED_MANAGER_IPS')))) {
            return redirect('/login')->with('error', 'Unauthorized.');
        }

        return $next($request);
    }
}
