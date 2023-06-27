<?php

namespace App\Http\Controllers\API;

use Mail;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\web;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
//-----------------------------------------------------------//
//                           API Đăng kí
//----------------------------------------------------------//
public function register(Request $request)
{
     $data = $request->validate([
         'email'=>'required|email|max:255|unique:nguoi_dungs,email',
         'password'=>'required|string',
         'confirm_password'=>'required|same:password',
         'hoten'=>'required|string|max:255',
         'sdt'=> 'required|numeric',

     ]
    );
    $input['email']=$request->input('email');
    $input['mat_khau']=Hash::make($request->input('password'));
    $input['ten']=$request->input('hoten');
    $input['so_dien_thoai'] = $request->input('sdt');
    $input['trang_thai']=0;
    $input['cap']=2;
    $nguoidung= User::create($input);

      // thông tin của web
      $web = web::orderBy('id')->first();
      $ten_web = $web->ten ?? 'cao thắng';
      $email_web = $web->email ?? 'caothang@caothang.edu.vn';
       mail::send('email.email-kich-hoat-api',compact('nguoidung'), function($email) use($web, $nguoidung){
         // $email->to('địa chỉ email nhận','tên người nhận')
         //$email->subject('xác nhận đăng kí tài khoản');
         // lấy file
         //$email->attach('c:\laravel-master\laravel\public\uploads\image.png');
         //$email->attach('c:\laravel-master\laravel\public\uploads\test.txt');
         //email gửi

         if($web != null){
             $email->from($web->email,$web->ten);
         }else{
             $email->from('0306191038@caothang.edu.vn','thư xác nhận email');
         }
         // gửi thêm tệp đính kèm
         //$email->attach(public_path($hinh_anh->hinh_logo));

         // email nhận
         $email->to($nguoidung->email,$nguoidung->ten)->subject('XÁC NHẬN ĐĂNG KÍ TÀI KHOẢN');
     });
     $response=[
         'message'=>'Vui lòng check email',
         'data'=>$nguoidung,

     ];

     return response()->json($response,200);
}
//-----------------------------------------------------------//
//                           API Đăng nhập
//----------------------------------------------------------//

public function login(Request $request)
{
    $data= $request->validate([
        'email'=>'required|email|max:255',
        'password'=>'required|string'
    ]);
    $user = User::where('email',$data['email'])->first();
    if(!$user|| !Hash::check($data['password'],$user->mat_khau))
    {
        return response(['message'=>'Tài khoản hoặc mật khẩu sai'],401);
    }else if($user->trang_thai == 0){
        return response(['message'=>'Tài khoản chưa được kích hoạt'],402);
    }
    else
    {
        $token= $user->createToken('user')->plainTextToken;
        $response=
        [
            'message'=>'Login Success',
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response,200);
    }
}
//-----------------------------------------------------------//
//                           API Đăng Xuất
//----------------------------------------------------------//


public function logout(Request $request)
{
    auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
    return response()->json([
        'message' => 'Đăng xuất thành công',
    ], 200);;
}


public function user(){
    $response=[
        "user"=>auth()->user()];
    return response()->json($response,200);
}
public function update(Request $request){

}

    public function changePassword(Request $request)
    {
        $attrs = $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:6|different:password',
            'confirm_password' => 'required|same:new_password',

        ]);
        $user = request()->user();
        if(!Hash::check($request->password, $user->mat_khau)){
            return response()->json([
                'status_code' => 422,
                'message' => ' Mật khẩu không tồn tại'
            ]);
        }
        $user->mat_khau = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'status_code'=>200,
                'message' => 'Đổi mật khẩu thành công'
            ]);

    }
}
