<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\web;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index(){
        $web = web::orderBy('id')->first();
        $data= [
            'pageTitle' => trans('public.info_web'),
            'web' => $web,
            'title'=> trans('public.info_web'),
        ];
        return view('admin.web.web', $data);
    }

    public function store(Request  $request){
        $rule = [
            'ten' => 'required',
            'so-dien-thoai'=>'required|numeric',
            'web' => 'required',
            'email' => 'required|email',
            'dia-chi' => 'required',
            'tieu-de-noi-dung'=>'',
            'noidung' =>'',
            'tieu-de-mo-ta'=>'',
            'mota' =>'',
            'nhung-ban-do' => '',
            'hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'email' => 'Vui lòng nhập đúng định dạng email',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten' => 'Tên công ty',
            'so-dien-thoai'=>'Số điện thoại',
            'web' => 'tên trang web',
            'email' => 'Email',
            'dia-chi' => 'Địa chỉ',
            'tieu-de-noi-dung' =>'Nội dung',
            'noidung' =>'Nội dung',
            'tieu-de-mo-ta' =>'Tiêu đề mô tả',
            'mota' =>'Mô tả',
            'nhung-ban-do' => 'Bản đồ',
            'hinh'=>'hình ảnh',
        ];

        $request->validate($rule, $message, $attribute);

        $ten = $request->input('ten');
        $so_dien_thoai = $request->input('so-dien-thoai');
        $ten_web = $request->input('web');
        $email = $request->input('email');
        $dia_chi = $request->input('dia-chi');
        $noi_dung  = $request->input('noidung');
        $tieu_de_noi_dung  = $request->input('tieu-de-noi-dung');
        $mo_ta  = $request->input('mota');
        $tieu_de_mo_ta  = $request->input('tieu-de-mo-ta');
        $ban_do = $request->input('nhung-ban-do');
        $data = $request->all();
        $web = new web;
        $web->fill([
            'ten'=>$ten,
            'so_dien_thoai'=>$so_dien_thoai,
            'web'=>$ten_web,
            'email'=>$email,
            'dia_chi'=>$dia_chi,
            'tieu_de_noi_dung'=>$tieu_de_noi_dung,
            'tieu_de_mo_ta'=>$tieu_de_mo_ta,
            'noi_dung'=>$noi_dung,
            'mo_ta'=>$mo_ta,
            'ban_do'=>$ban_do,
        ]);
        $web->save();
        if(!empty($data['hinh'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh']->move(public_path('img/hinh_web/'), $file_name);
            $web->hinh = 'img/hinh_web/'.$file_name;
        }
        $web->save();
        return Redirect::route('admin.thong-tin-web.index')->with('success','Thêm dữ liệu thành công');

    }

     public function update(Request  $request, $id){
       $rule = [
            'ten' => 'required',
            'so-dien-thoai'=>'required|numeric',
            'web' => 'required',
            'email' => 'required|email',
            'dia-chi' => 'required',
            'tieu-de-noi-dung'=>'',
            'noidung' =>'',
            'tieu-de-mo-ta'=>'',
            'mota' =>'',
            'nhung-ban-do' => '',
            'hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'email' => 'Vui lòng nhập đúng định dạng email',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten' => 'Tên công ty',
            'so-dien-thoai'=>'Số điện thoại',
            'web' => 'tên trang web',
            'email' => 'Email',
            'dia-chi' => 'Địa chỉ',
            'tieu-de-noi-dung' =>'Nội dung',
            'noidung' =>'Nội dung',
            'tieu-de-mo-ta' =>'Tiêu đề mô tả',
            'mota' =>'Mô tả',
            'nhung-ban-do' => 'Bản đồ',
        ];
        $request->validate($rule, $message, $attribute);
        $ten = $request->input('ten');
        $so_dien_thoai = $request->input('so-dien-thoai');
        $ten_web = $request->input('web');
        $email = $request->input('email');
        $dia_chi = $request->input('dia-chi');
        $noi_dung  = $request->input('noidung');
        $tieu_de_noi_dung  = $request->input('tieu-de-noi-dung');
        $mo_ta  = $request->input('mota');
        $tieu_de_mo_ta  = $request->input('tieu-de-mo-ta');
        $ban_do = $request->input('nhung-ban-do');
        $data = $request->all();
        $web = web::find($id);
        $web->fill([
            'ten'=>$ten,
            'so_dien_thoai'=>$so_dien_thoai,
            'web'=>$ten_web,
            'email'=>$email,
            'dia_chi'=>$dia_chi,
            'tieu_de_noi_dung'=>$tieu_de_noi_dung,
            'tieu_de_mo_ta'=>$tieu_de_mo_ta,
            'noi_dung'=>$noi_dung,
            'mo_ta'=>$mo_ta,
            'ban_do'=>$ban_do,
        ]);
        if(!empty($data['hinh'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh']->move(public_path('img/hinh_web/'), $file_name);
            $web->hinh = 'img/hinh_web/'.$file_name;
        }
        $web->save();

        return Redirect::route('admin.thong-tin-web.index')->with('success','sửa dữ liệu thành công');

    }
}
