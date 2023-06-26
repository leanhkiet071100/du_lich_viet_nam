<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dia_diem;
use App\Models\loai_dia_diem;
use App\Models\User;
use App\Models\tinh_huyen_xa;
use App\Models\quan_an;
use App\Models\mon_an;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class QuanAnController extends Controller
{
    public function index(Request $request)
    {
        $query = quan_an::query();
        $totalbaiviets = $query->count();
        $user = User::all();
        $query= $this->handleFilters($query, $request);
        $ls_quan_an = $query->paginate(10);
        //truy vấn theo with
        $tinh = quan_an::select('tinh')->groupby('tinh')->distinct()->get();
        $xa = quan_an::select('xa')->groupby('xa')->distinct()->get();
        $huyen = quan_an::select('huyen')->groupby('huyen')->distinct()->get();
        $ls_dia_diem = quan_an::join('dia_diems','dia_diems.id','=','quan_ans.dia_diem_id')
                        ->select('ten_dia_diem','dia_diems.id')->distinct()->get();
        $data= [
            'pageTitle' => "Quán ăn",
            'ls_quan_an' => $ls_quan_an,
            'user'=> $user,
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
            'ls_dia_diem'=>$ls_dia_diem,
        ];
        return view('admin.quanan.quanan-ds',$data);
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
        $location = $request->get('location', null);
        $noi_bat = $request->get('noi-bat', null);
        $query = fromAndToDateFilter($form, $to, $query, 'created_at');

        if (!empty($name)) {
            $query->where('ten_quan_an', 'like', '%' . $name . '%');
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
            $query->where('dia_chi', 'like', '%' . $address . '%');
        }

        if (!empty($noi_bat)) {
            $query->where('noi_bat', '=', 1);
        }
        if (!empty($location)) {
            $query->where('dia_diem_id', '=', $location);
        }
        return $query;
    }

    public function create()
    {
        $tinh = tinh_huyen_xa::where('loai','=',1)->orderBy('ten')->get();
        $huyen = tinh_huyen_xa::where('loai','=',2)->orderBy('ten')->get();
        $xa = tinh_huyen_xa::where('loai','=',3)->orderBy('ten')->get();
        $ls_dia_diem = dia_diem::select('ten_dia_diem','dia_diems.id')->get();
        $data= [
            'pageTitle' => "Quán ăn mới ",
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
            'ls_dia_diem'=>$ls_dia_diem,
        ];
        return view('admin.quanan.quanan-them', $data);
    }

    public function store(Request $request)
    {
         $rule = [
            'ten' => 'required',
            'so-dien-thoai' => 'required|numeric',
            'huyen' => 'required',
            'tinh'=>'required',
            'xa' => 'required',
            'dia-chi' => 'required',
            'hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten' => 'Tên quán ăn',
            'so-dien-thoai'=>'Số điện thoại',
            'huyen' => 'Huyện',
            'tinh'=>'Tỉnh ',
            'xa' => 'Xã',
            'dia-chi' => 'Địa chỉ',
            'hinh'=>'Hình quán ăn',
        ];
        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $tinh = tinh_huyen_xa::where('id', $data['tinh'])->first();
        $huyen =  tinh_huyen_xa::where('id', $data['huyen'])->first();
        $xa =  tinh_huyen_xa::where('id', $data['xa'])->first();
        $dia_diem_id = $data['dia_diem_id'] ?? null;
        $quan_an = new quan_an;
        $quan_an->fill([
            'ten_quan_an'=> $data['ten'],
            'dia_diem_id'=> $dia_diem_id,
            'tinh'=>$tinh->ten,
            'huyen'=>$huyen->ten,
            'xa'=>$xa->ten,
            'dia_chi'=> $data['dia-chi'],
            'so_dien_thoai'=>$data['so-dien-thoai'],
        ]);
        $quan_an->save();
        if(!empty($data['hinh'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh']->move(public_path('hinh_quan_an/'.$quan_an->id), $file_name);
            $quan_an->hinh_quan_an = 'hinh_quan_an/'.$quan_an->id.'/'.$file_name;
        }
        $quan_an->save();
        return Redirect::route('admin.quan-an.edit',['id' => $quan_an->id]);
    }

    public function edit($id)
    {
        $quan_an = quan_an::find($id);
        $tinh = tinh_huyen_xa::where('loai','=',1)->orderBy('ten')->get();
        $huyen = tinh_huyen_xa::where('loai','=',2)->orderBy('ten')->get();
        $xa = tinh_huyen_xa::where('loai','=',3)->orderBy('ten')->get();
        $tinh_quan_an =tinh_huyen_xa::where('loai','=',1)->where('ten','=',$quan_an->tinh)->first();
        $huyen_quan_an =tinh_huyen_xa::where('loai','=',2)->where('ten','=',$quan_an->huyen)->first();
        $ls_huyen_tinh =tinh_huyen_xa::where('loai','=',2)->where('parent_id','=',$tinh_quan_an->id)->get();
        $ls_xa_huyen =tinh_huyen_xa::where('loai','=',3)->where('parent_id','=',$huyen_quan_an->id)->get();
        $ls_dia_diem = dia_diem::select('ten_dia_diem','dia_diems.id')->get();
        $ls_mon_an = mon_an::where('quan_an_id',$id)->paginate(5);

        $data= [
            'pageTitle' => trans('public.create_location'),
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
            'quan_an'=>$quan_an,
            'tinh_quan_an'=>$tinh_quan_an,
            'huyen_quan_an'=>$huyen_quan_an,
            'ls_huyen_tinh'=>$ls_huyen_tinh,
            'ls_xa_huyen'=>$ls_xa_huyen,
            'ls_dia_diem'=>$ls_dia_diem,
            'ls_mon_an'=>$ls_mon_an,
            'quan_an_id'=>$id,
        ];
        return view('admin.quanan.quanan-sua', $data);
    }

    private function handleFilters_mon_an($query, $request){
        $name = $request->get('name', null);
        if (!empty($name)) {
            $query->where('ten_mon_an', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'ten' => 'required',
            'so-dien-thoai' => 'required|numeric',
            'huyen' => 'required',
            'tinh'=>'required',
            'xa' => 'required',
            'dia-chi' => 'required',
            'hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',
        ];
        $attribute = [
            'ten' => 'Tên quán ăn',
            'so-dien-thoai'=>'Số điện thoại',
            'huyen' => 'Huyện',
            'tinh'=>'Tỉnh ',
            'xa' => 'Xã',
            'dia-chi' => 'Địa chỉ',
            'hinh'=>'Hình quán ăn',
        ];
        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $tinh = tinh_huyen_xa::where('id', $data['tinh'])->first();
        $huyen =  tinh_huyen_xa::where('id', $data['huyen'])->first();
        $xa =  tinh_huyen_xa::where('id', $data['xa'])->first();
        $quan_an = quan_an::find($id);
        $quan_an->fill([
            'ten_quan_an'=> $data['ten'],
            'dia_diem_id'=> $data['dia_diem_id'],
            'tinh'=>$tinh->ten,
            'huyen'=>$huyen->ten,
            'xa'=>$xa->ten,
            'dia_chi'=> $data['dia-chi'],
            'so_dien_thoai'=>$data['so-dien-thoai'],
        ]);
        if(!empty($data['hinh'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $data['hinh']->move(public_path('hinh_quan_an/'.$quan_an->id), $file_name);
            $quan_an->hinh_quan_an = 'hinh_quan_an/'.$quan_an->id.'/'.$file_name;
        }
        $quan_an->save();
        return Redirect::route('admin.quan-an.index')->with('success','Sửa thành công');
    }

    public function destroy($id)
    {
        $quan_an = quan_an::find($id);
        $quan_an->delete();
        return Redirect::route('admin.quan-an.index')->with('success','Xóa thành công');
    }

    public function noi_nat(Request $request,$id){
        $check = $request->check;
        $sanpham = quan_an::find($id);
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
