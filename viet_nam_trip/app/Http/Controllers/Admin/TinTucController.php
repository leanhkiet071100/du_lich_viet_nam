<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\bai_viet;
use App\Models\User;

class TinTucController extends Controller
{
        //Quản lí bài viết
    public function index(Request $request){
       
        //$lstintuc = bai_viet::orderBy('created_at','ASC')->paginate(15);
        
        $query = bai_viet::query();

        $totaltintucs = $query->count();
        $user = User::all();
        $query = $query->where('loai_bai_viet', 1);
        $query= $this->handleFilters($query, $request);
   
        $lstintuc = $query->paginate(15);

        $data= [
            'pageTitle' => "Tin tức",
            'lstintuc' => $lstintuc,
            'user'=> $user,
            'title'=> trans('public.news')
        ];
   
        return view('admin.tintuc.tintuc-ds', $data);
    }

    //tìm kiếm 
    private function handleFilters($query, $request){
        $form = $request->get('form', null);
        $to = $request->get('to', null);
        $title = $request->get('title', null);
        //$author_id = $request->get('author_id', null);
        $hien = $request->get('hien', null);
        $noi_bat = $request->get('noi-bat', null);
        $query = fromAndToDateFilter($form, $to, $query, 'created_at');

        if (!empty($title)) {
            $query->where('tieu_de', 'like', '%' . $title . '%');
        }

        // if (!empty($author_id) and count($author_id)) {
        //     $query->whereIn('nguoi_dung_id', $author_id);
        // }

        if (!empty($hien)) {
            $query->where('hien', '=', '1');
        }
        if (!empty($noi_bat)) {
            $query->where('noi_bat', '=', 1);
        }
        return $query;
    }

    //thêm Bài viết
    public function create(){
        $data = [
            'pageTitle' => trans('public.create_post'),
            'title'=> trans('public.news')
        ];
        
        return view('admin.tintuc.tintuc-them', $data);
    }

    public function store(Request $request){
        
        $rule = [
            'hinhtintuc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'hinhtintuc' => 'Hình bài viêt',
            'phude' => 'Phụ để',
            'noidung' => 'Nội dung',
            'tieude' => 'Tiêu đề',
        ];
        $request->validate($rule, $message, $attribute);
        $hinhtintuc = $request->file('hinhtintuc');
        $phude = $request->input('phude');
        $noidung = $request->input('noidung');
        $tieude = $request->input('tieude');
        $tintucmoi = new bai_viet;
        $tintucmoi->fill([
               
                'tieu_de'=> $tieude,
                'phu_de'=> $phude,
                //'hinh_anh'=>$ten_file,
                'loai_bai_viet'=>1,
                'noi_dung'=>$noidung,
                'hien'=> 1,
                'noi_bat'=>1,
         ]);
         $tintucmoi->save();
        if($hinhtintuc != null){
            //$file_name = time().Str::random(10).'.'.$hinhtintuc->getClientOriginalExtension();
            $file_name = $hinhtintuc->getClientOriginalName();
            $imagePath = $hinhtintuc->move(public_path('hinh_anh_tin_tuc/'), $file_name);
            $ten_file = 'hinh_anh_tin_tuc/'.$file_name;
            $tintucmoi->hinh_anh_bai_viet = $ten_file;
            $tintucmoi->save();
        }
        return Redirect::route('admin.tin-tuc.index')->with('success','Thêm thành công');
    }

    //chi tiết bài viết
    public function chi_tiet_bai_viet($id){
        $tintuc = tintuc::join('nguoidungs','nguoidungs.id', '=','tintucs.ma_nguoi_dung')
                            ->select('tintucs.*','nguoidungs.ten','nguoidungs.hinh_dai_dien')
                            ->find($id);
        return view('admin.tintuc.tintuc-chitiet')->with(['tintuc'=>$tintuc]);
    }

    //sửa bài viết
     public function edit($id){
        $tintuc = bai_viet::find($id);
       
        if (!empty($bundle)) {
            abort(404);
        }
        $data = [
            'pageTitle'=>trans('edit_post'),
            'tintuc' => $tintuc,
            'title'=> trans('public.news')

        ];
        return view('admin.tintuc.tintuc-sua', $data);
    }

    public function update(Request $request,$id){
         $rule = [
            'hinhtintuc' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
            'hinhtintuc' => 'Hình bài viêt',
            'phude' => 'Phụ để',
            'noidung' => 'Nội dung',
            'tieude' => 'Tiêu đề',
        ];
        $request->validate($rule, $message, $attribute);
        $hinhtintuc = $request->file('hinhtintuc');
        $phude = $request->input('phude');
        $noidung = $request->input('noidung');
        $tieude = $request->input('tieude');
     
        $tintuc = bai_viet::find($id);
     
        $tintuc->fill([
                'tieu_de'=> $tieude,
                'phu_de'=> $phude,
                'noi_dung'=>$noidung,
            ]);
          
        if($hinhtintuc != null){
            //$file_name = time().Str::random(10).'.'.$hinhtintuc->getClientOriginalExtension();
            $file_name = $hinhtintuc->getClientOriginalName();
            $imagePath = $hinhtintuc->move(public_path('hinh_anh_tin_tuc/'), $file_name);
            $ten_file = 'hinh_anh_tin_tuc/'.$file_name;
            $tintuc->hinh_anh_bai_viet = $ten_file;
            $tintuc->save();
        }
        $tintuc->save();
        return Redirect::route('admin.tin-tuc.index')->with('success','sửa thành công');
    }
    
    //xóa bài viết
    public function destroy(Request $request, $id){
        $tintuc = bai_viet::find($id);
   
        if (!empty($tintuc)) {
            $tintuc->delete();
        }
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('public.delete_success'),
            'status' => 'success'
        ];
        return Redirect::route('admin.tin-tuc.index')->with(['toast'=>$toastData,'success'=>'xóa thành công']);
    }

    // radio

    public function hien(Request $request,$id){
        $check = $request->check;
        $tintuc = bai_viet::find($id);
        if($check=="true"){
            $tintuc->fill([
                'hien'=>1
            ]);
        }else{
            $tintuc->fill([
                'hien'=>0
            ]);
        }
        $tintuc->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    public function noi_bat(Request $request,$id){
        $check = $request->check;
        $tintuc = bai_viet::find($id);
        if($check=="true"){
            $tintuc->fill([
                'noi_bat'=>1
            ]);
        }else{
            $tintuc->fill([
                'noi_bat'=>0
            ]);
        }
        $tintuc->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }
}
