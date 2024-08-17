<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasntTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user->role === 'team') {
            if ($user->team !== null) {
                return redirect()->to(route('dashboard'));
            }
            return $next($request); 
        }
        return redirect()->to(route('dashboard'));
    }
}
