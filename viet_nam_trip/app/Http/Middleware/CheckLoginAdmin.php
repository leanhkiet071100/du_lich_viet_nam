<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        }elseif(Auth::user()->cap_id == 0 ){
            return redirect()->route('admin.login')->with('yes','bạn không có quyền hạn vào trang admin');
        }
        // return $next($request);
    }
}
