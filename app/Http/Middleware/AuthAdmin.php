<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(AUth::check())
        {
            if(Auth::user()->utype === 'ADM')
            {
                return $next($request);
            }
            else
            {
                Session::flash('error', 'You are not authorized to access this page.');
                return redirect()->route('login');
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }
}

