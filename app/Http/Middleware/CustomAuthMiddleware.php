<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Dump the authenticated user for debugging purposes
        // dd(Auth::user());

        if (Auth::check()) {
            // User is authenticated
            return $next($request);
        }

        // User is not authenticated, redirect to login or perform other actions
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
