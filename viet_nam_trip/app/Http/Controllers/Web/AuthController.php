<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\web;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Mail;

class AuthController extends Controller
{
        //đăng nhập user
    public function dang_nhap()
    {
         $data= [
            'pageTitle' => "Tin tức",
            'email' => null,
            'mat_khau'=> null,
        ];
        return view('web.auth.dang-nhap', $data);
    }

    public function post_dang_nhap(Request $request){
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
         $data= [
            'pageTitle' => "Tin tức",
            'email' => $email,
            'mat_khau'=> $mat_khau,
        ];
        // dd($nguoidung,$request->matkhau,Hash::check($request->matkhau,$nguoidung->password));
        if($nguoidung!=null){
                if(Hash::check($request->input('mat-khau'),$nguoidung->mat_khau)){
                    if($nguoidung->trang_thai == 0)
                    {
                        return view('web.auth.dang-nhap', $data)->WithErrors(['error' => 'Tài khoản của bạn chưa kích hoạt,'])->with(['email'=> $email,'mat_khau'=>$mat_khau,'kiet'=>'lê anh kiệt']);
                    }
                    elseif($nguoidung->trang_thai==2)
                    {
                        return view('web.auth.dang-nhap', $data)->WithErrors(['error' => 'Tài khoản của bạn bị khóa vui lòng liên hệ admin'])->with(['email'=> $email,'mat_khau'=>$mat_khau]);

                    }
                    else{
                        $request->session()->regenerate();
                        Auth::login($nguoidung);
                        $request->session()->put('LoggedUser', $nguoidung->id);
                        return redirect()->route('web.trang-chu.index', $data);
                    }
                }
                else{
                    return view('web.auth.dang-nhap', $data)->WithErrors(['error' => 'Sai mật khẩu'])->with(['email'=> $email,'mat_khau'=>$mat_khau]);
                    //return redirect()->back()->WithErrors(['error' => 'Sai mật khẩu'])->with(['email'=> $email,'mat_khau'=>$mat_khau]);
                }
        } else {
            return view('web.auth.dang-nhap', $data)->WithErrors(['error' => 'Địa chỉ email sai hoặc không tồn tại'])->with(['email'=> $email,'mat_khau'=>$mat_khau]);
        }
    }

    //đăng kí
     public function dang_ki()
    {
        $data= [
            'pageTitle' => "Tin tức",
            'email' => null,
            'mat_khau'=> null,
            'ho_ten'=>null,
            'sdt'=>null,
        ];
        return view('web.auth.dang-ki', $data);
    }

    public function post_dang_ki(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|max:255|unique:nguoi_dungs,email',
                'mat-khau' => 'required|min:6',
                'ho-ten' => 'required',
                'sdt' => 'required|numeric',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'mat-khau.required' => 'Vui lòng nhập mật khẩu',
                'mat-khau.min' => 'Mật khẩu ít nhất 6 ký tự',
                'ho-ten.required' => 'Vui lòng nhập họ tên',
                'sdt.required' => 'Vui lòng nhập số điện thoại',
                'sdt.numeric' => 'Số điện thoại phải là số',
            ]);
        // thông tin của web
        $web = web::orderBy('id')->first();
        $ten_web = $web->ten;
        $email_web = $web->email;
        // $hinh_anh = logo::orderBy('id')->first();
        // thông tin người dung
        $sdt = $request->input('sdt');
        $ho_ten = $request->input('ho-ten');
        $email = $request->email;
        $mat_khau = $request->input('mat-khau');
        $token = strtoupper(Str::random(10));
        // mail::send('tenview',(['gắn biến'])
        $nguoidung = User::create([
                    'ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai'  => $sdt,
                    'remember_token' => $token,
                    'mat_khau' => Hash::make($mat_khau),
                    'cap' => 2,
                    'trang_thai' => 0,
                    'is_admin'=>0,
                ]);

        // vd: Mail::send('email.dangki',['name'=>'test']);

        Mail::send('email.email-kich-hoat',compact('nguoidung'), function($email) use($web, $nguoidung){
            // $email->to('địa chỉ email nhận','tên người nhận')
            //$email->subject('Xác nhận đăng kí tài khoản');
            // lấy file
            //$email->attach('C:\laravel-master\laravel\public\uploads\image.png');
            //$email->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            //email gửi

            if($web != null){
                $email->from($web->email,$web->ten);
            }else{
                $email->from('0306191038@caothang.edu.vn','cửa hàng quần áo');
            }
            // gửi thêm tệp đính kèm
            //$email->attach(public_path($hinh_anh->hinh_logo));

            // email nhận
            $email->to($nguoidung->email,$nguoidung->ten)->subject('XÁC NHẬN ĐĂNG KÍ TÀI KHOẢN');
        });
        return Redirect::route('web.auth.dang-nhap')->With(['yes' => 'Vui lòng check email để kích hoạt tài khoản']);
    }

    public function kich_hoat($id, $token){
        $nguoidung = User::find($id);
        if($nguoidung->remember_token === $token){
            $nguoidung->update(['trang_thai'=>1,'token'=>null]);
            return Redirect::route('web.auth.dang-nhap')->with('success','Xác nhận thành công, bạn có hể đăng nhập');
        }else {
            return Redirect::route('web.auth.dang-nhap')->WithErrors(['error' => 'xác  nhận không thành công']);
        }

    }

    //đăng xuất
    public function dang_xuat(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('web.auth.dang-nhap');
    }

    // quên mật khẩu
    public function quen_mat_khau(){
        return view('auth.quen-mat-khau')->with(['email'=> null]);
    }
}
