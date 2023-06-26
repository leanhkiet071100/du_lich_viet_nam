<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(!Auth::check()){
            return redirect()->route('admin.login')->with('yes','Bạn vui lòng đăng nhập để thực hiện chức năng');
        }elseif(Auth::user()->is_admin == 1 ){
            return $next($request);
        }elseif(Auth::user()->is_admin != 1 ){
            return redirect()->route('web.trang-chu.index')->with('yes','bạn không có quyền hạn vào trang admin');
        }
        // return $next($request);
    }
}
