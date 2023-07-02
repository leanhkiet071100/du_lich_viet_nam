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

//-----------------------------------------------------------//
//                           API Quên mật khẩu
//----------------------------------------------------------//
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


public function user(){
    $response=[
        "user"=>auth()->user()];
    return response()->json($response,200);
}
// quên mật khẩu


public function post_quen_mat_khau(Request $request){
    
     $this->validate($request,
        [
            'email' => 'required|email|max:255',
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
        ]);
    // thông tin của web
    $web = web::orderBy('id')->first();
    $ten_web = $web->ten ?? 'web';
    $email_web = $web->email ?? 'web.@gmail.com';
    // $hinh_anh = logo::orderBy('id')->first();
    // thông tin người dung
    $email = $request->input('email');
    $nguoidung = User::where('email', $email)->first();
    if($nguoidung == null){
        return response()->json([
            'message' => 'Email chưa đăng kí',
        ], 201);
    } else {
    $code = mt_rand(100000, 999999);
    Mail::send('email.email-gui-ma',compact('nguoidung', 'code'), function($email) use($web, $nguoidung){
        if($web != null){
            $email->from($web->email,$web->ten);
        }else{
            $email->from('0306191038@caothang.edu.vn','Trang web');
        }
        $email->to($nguoidung->email,$nguoidung->ten)->subject('XÁC NHẬN QUÊN MẬT KHẨU');
    });
    //$request->put($nguoidung->email, $code);
    
    $token= $nguoidung->createToken('user')->plainTextToken;
        $response=
        [
            'message'=>'Vui lòng kiểm tra mail',    
            'user'=>$nguoidung,        
            'token'=>$token,
            'code'=>$code
        ];
        return response()->json($response,200);
    }
}

public function quen_mat_khau_xac_nhan(Request $request){
    return code();
    $this->validate($request,
        [
            'quen-mat-khau-ma' => 'required',
        ],
        [
            'quen-mat-khau-ma.required' => 'Không được bỏ trống',
        ]);
    $input['quen-mat-khau']=$request->input('qmk');
    if($code == session($email)){
        $request->session()->forget($email);
        return Redirect::route('web.auth.doi-mat-khau',['email'=>$email])->with(['yes'=>'Mời bạn nhập mật khẩu mới']);
    }else{
        return  Redirect::route('web.auth.quen-mat-khau-ma',['email'=>$email])->WithErrors(['error' => 'Bạn đã nhập sai vui lòng nhập lại']);
    }
}

public function doi_mat_khau(Request $request, $email){
    $data= [
            'pageTitle' => "Quên mật khẩu",
            'email'=>$email,
        ];
    return view('web.auth.doi-mat-khau', $data);
}

public function post_doi_mat_khau(Request $request, $email){
     $nguoidung = User::where('email', $email)->first();
        $rule = [
        'mat-khau-moi'=> 'required|min:6| max:50',
        'xac-nhan-mat-khau-moi' => 'required|min:6| max:50|same:mat-khau-moi',
        ];$message =[
        'required' => ':attribute không được để trống',
        'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
        'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
        'numeric' => ':attribute phải là số',
        'image'=> ':attribute phải là hình ảnh',
        'same' => 'Không trùng mật khẩu',
        ];$attribute = [
        'xac-nhan-mat-khau'=>'Xác nhận mật khẩu',
        'ma-xac-nhan' => 'Ma xác nhận',
        ];
    $request->validate($rule, $message, $attribute);
    $mat_khau_moi = $request->input('mat-khau-moi');
    $xac_nhan_mat_khau_moi = $request->input('xac-nhan-mat-khau-moi');

    $nguoidung->update([
        'mat_khau' => Hash::make($mat_khau_moi),

    ]);
    $nguoidung->save();
    return Redirect::route('web.auth.dang-nhap')->with('success','Đổi mật khẩu thành công');

}


    
}


