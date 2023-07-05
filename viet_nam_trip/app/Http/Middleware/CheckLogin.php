<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('web.auth.dang-nhap')->with('login','Bạn vui lòng đăng nhập để thực hiện chức năng');
        }else{
            return $next($request);
        }
    }
}
