<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class AuthUser
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
        if(!auth()->check()){
            return redirect('/admin/login');
        }
        if(auth()->check()){
            if(auth()->user()->is_admin == 'no')
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
