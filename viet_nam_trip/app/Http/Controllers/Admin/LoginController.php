<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'pageTitle' => trans('auth.login'),
        ];

        return view('admin.login.login', $data);
    }

     public function post_login_admin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email|max:255',
                'mat-khau' => 'required|min:6'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.regex' => 'Email phải có dạng: caothang.edu.vn',
                'mat-khau.required' => 'Vui lòng nhập mật khẩu',
                'mat-khau.min' => 'Mật khẩu ít nhất 6 ký tự',
            ]);
        $email = $request->email;
        $mat_khau = $request->input('mat-khau');
        $nguoidung = User::where('email', $email)->first();
        $data = [
            'pageTitle' => trans('auth.login'),
            'email' => $email,
            'mat_khau'=>$mat_khau,
        ];
        // dd($nguoidung,$request->matkhau,Hash::check($request->matkhau,$nguoidung->password));
        if($nguoidung!=null){
            if($nguoidung->trang_thai == 1){
                if(Hash::check($request->input('mat-khau'),$nguoidung->mat_khau)){
                    if($nguoidung->is_admin == 1){
                        $request->session()->regenerate();
                        Auth::login($nguoidung);
                        $request->session()->put('LoggedUser', $nguoidung->id);
                        return redirect()->route('admin.tin-tuc.index');
                    }
                    else{
                        return Redirect::route('admin.login')->with(['error' => 'Xin lỗi bạn không có quyền hạn vào trang này']);
                    }

                }
                else{
                    return Redirect::route('admin.login')->with(['error' => 'Sai mật khẩu']);
                    //return redirect()->back()->WithErrors(['error' => 'Sai mật khẩu'])->with(['email'=> $email,'mat_khau'=>$mat_khau]);
                }
            }else{
                    return Redirect::route('admin.login')->with(['error' => 'Tài khoản đã bị khóa']);
            }
        } else {
            return Redirect::route('admin.login')->with(['error' => 'Địa chỉ email sai hoặc không tồn tại']);
        }
    }

    public function logout_admin(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login-admin');
    }
}
