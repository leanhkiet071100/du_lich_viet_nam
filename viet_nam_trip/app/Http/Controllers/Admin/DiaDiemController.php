<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dia_diem;
use App\Models\loai_dia_diem;
use App\Models\User;
use App\Models\tinh_huyen_xa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiaDiemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = dia_diem::query();
        $totalbaiviets = $query->count();
        $user = User::all();
        $query= $this->handleFilters($query, $request);
        $lsdiadiem = $query->paginate(15);
        //truy vấn theo with
        $tinh = dia_diem::select('tinh')->groupby('tinh')->distinct()->get();
        $xa = dia_diem::select('xa')->groupby('xa')->distinct()->get();
        $huyen = dia_diem::select('huyen')->groupby('huyen')->distinct()->get();
        $data= [
            'pageTitle' => "Địa điểm",
            'lsdiadiem' => $lsdiadiem,
            'user'=> $user,
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
        ];
        return view('admin.diadiem.diadiem-ds',$data);
    }

    //tìm kiếm
    private function handleFilters($query, $request){
        $form = $request->get('form', null);
        $to = $request->get('to', null);
        $name = $request->get('name', null);
        $tinh = $request->get('conscious', null);
        $huyen = $request->get('district', null);
        $xa = $request->get('commune', null);
        $address = $request->get('address', null);
        $noi_bat = $request->get('noi-bat', null);
        $query = fromAndToDateFilter($form, $to, $query, 'created_at');

        if (!empty($name)) {
            $query->where('ten_dia_diem', 'like', '%' . $name . '%');
        }
        if (!empty($tinh)) {
            $query->where('tinh', 'like', '%' . $tinh . '%');
        }
        if (!empty($huyen)) {
            $query->where('huyen', 'like', '%' . $huyen . '%');
        }
        if (!empty($xa)) {
            $query->where('xa', 'like', '%' . $xa . '%');
        }
        if (!empty($address)) {
            $query->where('chi_tiet_dia_chi', 'like', '%' . $address . '%');
        }

        if (!empty($noi_bat)) {
            $query->where('noi_bat', '=', 1);
        }
        return $query;
    }

    public function create()
    {
        $tinh = tinh_huyen_xa::where('loai','=',1)->orderBy('ten')->get();
        $huyen = tinh_huyen_xa::where('loai','=',2)->orderBy('ten')->get();
        $xa = tinh_huyen_xa::where('loai','=',3)->orderBy('ten')->get();
        $data= [
            'pageTitle' => trans('public.create_location'),
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
        ];
        return view('admin.diadiem.diadiem-them', $data);
    }

    public function store(Request $request)
    {
         $rule = [
            'ten_dia_diem' => 'required|unique:dia_diems',
            'mua-du-lich'=>'required',
            'huyen' => 'required',
            'tinh'=>'required',
            'xa' => 'required',
            'dia-chi' => 'required',
            'noidung' => 'required',
            'mota' =>'required',
            'hinh-dia-diem'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten_dia_diem' => 'Tên địa điểm',
            'mua-du-lich'=>'mùa du lịch',
            'huyen' => 'Huyện',
            'tinh'=>'Tỉnh ',
            'xa' => 'Xã',
            'dia-chi' => 'Địa chỉ',
            'noidung' => 'Nội dung',
            'mota' =>'Mô tả',
            'hinh-dia-diem'=>'Hình địa điểm',
        ];
        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $tinh = tinh_huyen_xa::where('id', $data['tinh'])->first();
        $huyen =  tinh_huyen_xa::where('id', $data['huyen'])->first();
        $xa =  tinh_huyen_xa::where('id', $data['xa'])->first();
        $dia_diem = new dia_diem;
        $dia_diem->fill([
            'ten_dia_diem'=> $data['ten_dia_diem'],
            'mua_du_lich'=> $data['mua-du-lich'],
            'mo_ta'=> $data['mota'],
            'noi_dung'=>$data['noidung'],
            'hinh_anh_dia_diem'=>'',
            'tinh'=>$tinh->ten,
            'huyen'=>$huyen->ten,
            'xa'=>$xa->ten,
            'chi_tiet_dia_chi'=> $data['dia-chi'],
        ]);
        $dia_diem->save();
        if(!empty($data['hinh-dia-diem'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh-dia-diem']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh-dia-diem']->move(public_path('hinh-dia-diem/'.$dia_diem->id), $file_name);
            $dia_diem->hinh_anh_dia_diem = 'hinh-dia-diem/'.$dia_diem->id.'/'.$file_name;
        }
        $dia_diem->save();
        return Redirect::route('admin.dia-diem.edit',['id' => $dia_diem->id]);
    }

    public function show($id)
    {
        $dia_diem = dia_diem::find($id);
        $data= [
            'pageTitle' => "Địa điểm chi tiết",
            'dia_diem' => $dia_diem,
        ];
        return view('admin.diadiem.diadiem-chitiet', $data);
    }

    public function edit($id)
    {
        $dia_diem = dia_diem::find($id);
        $tinh = tinh_huyen_xa::where('loai','=',1)->orderBy('ten')->get();
        $huyen = tinh_huyen_xa::where('loai','=',2)->orderBy('ten')->get();
        $xa = tinh_huyen_xa::where('loai','=',3)->orderBy('ten')->get();
        $tinh_dia_diem =tinh_huyen_xa::where('loai','=',1)->where('ten','=',$dia_diem->tinh)->first();
        $huyen_dia_diem =tinh_huyen_xa::where('loai','=',2)->where('ten','=',$dia_diem->huyen)->first();
        $ls_huyen_tinh =tinh_huyen_xa::where('loai','=',2)->where('parent_id','=',$tinh_dia_diem->id)->get();
        $ls_xa_huyen =tinh_huyen_xa::where('loai','=',3)->where('parent_id','=',$huyen_dia_diem->id)->get();
        $data= [
            'pageTitle' => $dia_diem->ten_dia_diem,
            'title'=> $dia_diem->ten_dia_diem,
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
            'dia_diem'=>$dia_diem,
            'tinh_dia_diem'=>$tinh_dia_diem,
            'huyen_dia_diem'=>$huyen_dia_diem,
            'ls_huyen_tinh'=>$ls_huyen_tinh,
            'ls_xa_huyen'=>$ls_xa_huyen,
        ];
        return view('admin.diadiem.diadiem-sua', $data);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'ten_dia_diem' => 'required',
            'mua-du-lich'=>'required',
            'huyen' => 'required',
            'tinh'=>'required',
            'xa' => 'required',
            'dia-chi' => 'required',
            'noidung' => 'required',
            'mota' =>'required',
            'hinh-dia-diem'=>'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten_dia_diem' => 'Tên địa điểm',
            'mua-du-lich'=>'mùa du lịch',
            'huyen' => 'Huyện',
            'tinh'=>'Tỉnh ',
            'xa' => 'Xã',
            'dia-chi' => 'Địa chỉ',
            'noidung' => 'Nội dung',
            'mota' =>'Mô tả',
            'hinh-dia-diem'=>'Hình địa điểm',
        ];
        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $tinh = tinh_huyen_xa::where('id', $data['tinh'])->first();
        $huyen =  tinh_huyen_xa::where('id', $data['huyen'])->first();
        $xa =  tinh_huyen_xa::where('id', $data['xa'])->first();
        $dia_diem = dia_diem::find($id);
        $dia_diem->fill([
            'ten_dia_diem'=> $data['ten_dia_diem'],
            'mua_du_lich'=> $data['mua-du-lich'],
            'mo_ta'=> $data['mota'],
            'noi_dung'=>$data['noidung'],
            'tinh'=> $tinh->ten,
            'huyen'=> $huyen->ten,
            'xa'=> $xa->ten,
            'chi_tiet_dia_chi'=> $data['dia-chi'],
        ]);
        if(!empty($data['hinh-dia-diem'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh-dia-diem']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh-dia-diem']->move(public_path('hinh-dia-diem/'.$dia_diem->id), $file_name);
            $dia_diem->hinh_anh_dia_diem = 'hinh-dia-diem/'.$dia_diem->id.'/'.$file_name;
        }
        $dia_diem->save();
        return Redirect::route('admin.dia-diem.index');
    }

    public function destroy($id)
    {
        $dia_diem = dia_diem::find($id);
        $dia_diem->delete();
        return Redirect::route('admin.dia-diem.index')->with('success','Xóa thành công');
    }

    public function noi_nat(Request $request,$id){
        $check = $request->check;
        $sanpham = dia_diem::find($id);
        if($check=="true"){
            $sanpham->fill([
                'noi_bat'=>1
            ]);
        }else{
            $sanpham->fill([
                'noi_bat'=>0
            ]);
        }
        $sanpham->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    // tỉnh huyện xã
    public function get_load_huyen(Request $request){
      $parent_id = $request->parent_id;
      $lshuyen = tinh_huyen_xa::where('loai',2)->where('parent_id',$parent_id)->orderBy('ten')->get();
      return response()->json(['data' => $lshuyen]);
    }

    public function get_load_xa(Request $request){
      $parent_id = $request->parent_id;
      $lsxa = tinh_huyen_xa::where('loai',3)->where('parent_id',$parent_id)->orderBy('ten')->get();
      return response()->json(['data' => $lsxa]);
    }
}
