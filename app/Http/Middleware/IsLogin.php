<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLogin
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
       
			// Session::put('is_login', true);
			// Session::put('users', $user);
        // dd($_SESSION['is_login']);//$request->session()->get('is_login'));
		// dd($_SESSION['is_login']);
        if (!isset($_SESSION['is_login'])) {
		// if (!Session::get('is_login')) {
            return redirect()->route('admin_login');
        }
        return $next($request);
    

    }
}
