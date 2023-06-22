<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check the user's role
            if ($user->role == 'User Manager' || $user->role == 'Admin') {
                // Redirect or return an error response based on your requirements
                return $next($request);

            }
        }

        return redirect()->route('welcome');
    }
}
