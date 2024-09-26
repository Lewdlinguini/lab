<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return redirect('/login')->with('error', 'You must be logged in to access this resource.');
            }

            // Check if the user has the specified role
            if (Auth::user()->role && Auth::user()->role->name === $role) {
                return $next($request);
            }

            return redirect('/')->with('error', 'You do not have the required permissions to access this resource.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Role middleware error: ' . $e->getMessage());
            return redirect('/')->with('error', 'An error occurred while checking permissions.');
        }
    }
}
