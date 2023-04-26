<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bai_viet;


class BaiVietController extends Controller
{
     //Quản lí bài viết
    public function bai_viet(){
       
        //$lsbaiviet = bai_viet::orderBy('created_at','DESC')->paginate();
        //dd($data);
        //dd(request()->search);
        $key = request()->search;

        if($key == null)
        {  
            $lsbaiviet = bai_viet::orderBy('created_at','DESC')
                    ->paginate(10);
            
        }else{
            $lsbaiviet = babai_vietiviet::where('tieu_de','like','%'.$key.'%')
                    ->orderBy('created_at','DESC')
                    ->paginate(10);
        }
        $data= [
            'pageTitle' => "Bài viết",
            'lsbaiviet' => $lsbaiviet,
        ];
        return view('admin.baiviet.baiviet-ds', $data);
    }

    //thêm Bài viết
    public function get_them_bai_viet(){
        return view('admin.baiviet.baiviet-them');
    }

    public function post_them_bai_viet(Request $request){
        $rule = [
            'hinhbaiviet' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'loaibaiviet'=>'required',
            'tieude' => 'required',
            'phude' => '',
            'noidung' => 'required',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',

        ];
        $attribute = [
            'hinhbaiviet' => 'Hình bài viêt',
            'loaibaiviet'=>'loại bài viết',
            'phude' => 'Phụ để',
            'noidung' => 'Nội dung',
            'tieude' => 'Tiêu đề',
        ];
        $request->validate($rule, $message, $attribute);
        $hinhbaiviet = $request->file('hinhbaiviet');
        $loaibaiviet = $request->input('loaibaiviet');
        $phude = $request->input('phude');
        $noidung = $request->input('noidung');
        $baivietmoi = new baiviet;
        $tieude = $request->input('tieude');
                    $baivietmoi->fill([
                'ma_nguoi_dung'=> 1,
                'tieu_de'=> $tieude,
                'phu_de'=> $phude,
                // 'hinh_anh'=>$ten_file,
                'loai_bai_viet'=>$loaibaiviet,
                'noi_dung'=>$noidung,
                'moi'=> 1,
                'noi_bat'=> 1,
                'hien'=> 1,
         ]);
         $baivietmoi->save();
        if($hinhbaiviet != null){
            $file_name = time().Str::random(10).'.'.$hinhbaiviet->getClientOriginalExtension();
            $imagePath = $hinhbaiviet->move(public_path('hinh_bai_viet/'), $file_name);
            $ten_file = 'hinh_bai_viet/'.$file_name;
            $baiviet->hinh_anh = $ten_file;
            $baivietmoi->save();
        }
         return Redirect::route('admin.bai-viet')->with('success','Thêm thành công');

        
    }

    //chi tiết bài viết
    public function chi_tiet_bai_viet($id){
        $baiviet = baiviet::join('nguoidungs','nguoidungs.id', '=','baiviets.ma_nguoi_dung')
                            ->select('baiviets.*','nguoidungs.ten','nguoidungs.hinh_dai_dien')
                            ->find($id);
        return view('admin.baiviet.baiviet-chitiet')->with(['baiviet'=>$baiviet]);
    }

    //sửa bài viết
     public function get_bai_viet_sua($id){
        $baiviet = baiviet::find($id);
        return view('admin.baiviet.baiviet-sua')->with(['baiviet'=>$baiviet]);
    }

    public function post_bai_viet_sua(Request $request,$id){
         $rule = [
            'hinhbaiviet' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'loaibaiviet'=>'required',
            'tieude' => 'required',
            'phude' => '',
            'noidung' => 'required',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',

        ];
        $attribute = [
            'hinhbaiviet' => 'Hình bài viêt',
            'loaibaiviet'=>'loại bài viết',
            'phude' => 'Phụ để',
            'noidung' => 'Nội dung',
            'tieude' => 'Tiêu đề',
        ];
        $request->validate($rule, $message, $attribute);
        $hinhbaiviet = $request->file('hinhbaiviet');
        $loaibaiviet = $request->input('loaibaiviet');
        $phude = $request->input('phude');
        $noidung = $request->input('noidung');
        $tieude = $request->input('tieude');
        $baiviet = baiviet::find($id);
        $baiviet->fill([
                'ma_nguoi_dung'=> 1,
                'tieu_de'=> $tieude,
                'phu_de'=> $phude,
                'loai_bai_viet'=>$loaibaiviet,
                'noi_dung'=>$noidung,
                'moi'=> 1,
                'noi_bat'=> 1,
                'hien'=> 1,
            ]);
          
        if($hinhbaiviet != null){
            $file_name = time().Str::random(10).'.'.$hinhbaiviet->getClientOriginalExtension();
            $imagePath = $hinhbaiviet->move(public_path('hinh_bai_viet/'), $file_name);
            $ten_file = 'hinh_bai_viet/'.$file_name;
            $baiviet->hinh_anh = $ten_file;
            $baiviet->save();
        }
        $baiviet->save();
        return Redirect::route('admin.bai-viet')->with('success','sửa thành công');
    }
    
    //xóa bài viết
    public function bai_viet_xoa($id){
        $baiviet = baiviet::find($id);
        $baiviet->delete();
        return  Redirect::route('admin.bai-viet')->with('success','Xóa thành công');
    }

    // radio

    public function bai_viet_hien(Request $request,$id){
        $check = $request->check;
        $baiviet = baiviet::find($id);
        if($check=="true"){
            $baiviet->fill([
                'hien'=>1
            ]);
        }else{
            $baiviet->fill([
                'hien'=>0
            ]);
        }
        $baiviet->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    public function bai_viet_moi(Request $request,$id){
        $check = $request->check;
        $baiviet = baiviet::find($id);
        if($check=="true"){
            $baiviet->fill([
                'moi'=>1
            ]);
        }else{
            $baiviet->fill([
                'moi'=>0
            ]);
        }
        $baiviet->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    public function bai_viet_noi_bat(Request $request,$id){
        $check = $request->check;
        $baiviet = baiviet::find($id);
        if($check=="true"){
            $baiviet->fill([
                'noi_bat'=>1
            ]);
        }else{
            $baiviet->fill([
                'noi_bat'=>0
            ]);
        }
        $baiviet->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    // kết quản lí bài viết

    // quản lí lí bình luận bài viết
    public function binh_luan_bai_viet(){
        $lsbinhluan = baiviet_binhluan::join('nguoidungs','nguoidungs.id', '=','baiviet_binhluans.ma_nguoi_dung')
                                        ->join('baiviets','baiviets.id', '=','baiviet_binhluans.ma_bai_viet')
                                        ->select('baiviet_binhluans.*','nguoidungs.ten','baiviets.tieu_de')
                                        ->paginate(10);
        return view('admin.baiviet.baiviet-binhluan')->with(['lsbinhluan'=>$lsbinhluan]);
    }

    public function binh_luan_bai_viet_hien(Request $request,$id){
        $check = $request->check;
        $baiviet = baiviet_binhluan::find($id);
        if($check=="true"){
            $baiviet->fill([
                'hien'=>1
            ]);
        }else{
            $baiviet->fill([
                'hien'=>0
            ]);
        }
        $baiviet->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }
    
    public function binh_luan_bai_viet_noi_bat(Request $request,$id){
        $check = $request->check;
        $baiviet = baiviet_binhluan::find($id);
        if($check=="true"){
            $baiviet->fill([
                'noi_bat'=>1
            ]);
        }else{
            $baiviet->fill([
                'noi_bat'=>0
            ]);
        }
        $baiviet->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    public function binh_luan_bai_viet_xoa($id){
        $binhluan_baiviet = baiviet_binhluan::find($id);
        $binhluan_baiviet->delete();
        return  Redirect::route('admin.binh-luan-bai-viet')->with('success','Xóa thành công');
    }

    // kết thúc quản lí bình luận bài viết
}
