<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class APICheckAdminSession
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return $next($request);
    }
}
