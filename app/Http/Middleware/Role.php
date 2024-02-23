<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    public function handle(Request $request, Closure $next ,String $role): Response
    {
        $user = Auth::user();
        if($user->role == $role)
            return $next($request);

        return redirect('/home');
    }
}
