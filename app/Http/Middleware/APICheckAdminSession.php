<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalAccessToken;
class APICheckAdminSession
{
    public function handle($request, Closure $next)
    {   
        $token = $request->header('authorization');
        $token_crush = explode('|', $token, 2);
        if (!$this->checker($token_crush[1])) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        return $next($request);
    }
    
    public function checker($token): bool 
    {   
        return PersonalAccessToken::findToken($token);
    }
}
