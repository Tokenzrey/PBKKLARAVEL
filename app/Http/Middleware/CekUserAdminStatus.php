<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekUserAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('userdata')['status'] == 'ADMIN') {
            return $next($request);
        }
        return redirect()->route('dashboard.user');
    }
}
