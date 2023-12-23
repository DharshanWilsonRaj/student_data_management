<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = Auth::user()->role;

        if (!in_array($userRole, $roles)) {
            if ($userRole == 0) {
                return redirect()->route('studentProfile');
            } else if ($userRole == 1) {
                return redirect()->route('student_table');
            }
        }

        return $next($request);
    }
}
