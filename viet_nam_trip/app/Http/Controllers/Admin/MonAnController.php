<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quan_an;
use App\Models\mon_an;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

class MonAnController extends Controller
{
    public function create($id){
        $data= [
            'quan_an_id'=>$id,
        ];
        return  view('admin.quanan.monan-them', $data);
    }

    public function store(Request $request, $idquan){
        $validator = Validator::make($request->all(), [
            'ten_mon' => 'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'gia' => 'required',
        ], $messages = [
            'required' => ':attribute không được bỏ trống',
            'image' => 'đây không phải là hình ảnh',
            'mimes' => 'hình ảnh phải có đuổi là: jpeg,png,jpg,gif,svg',
            'unique' => 'Tên địa điểm đã tồn tại',
        ],$attribute = [
            'ten_mon' => 'Tên món',
            'hinh'=>'Hình',
            'gia'=>'Giá bán',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $ten_mon = $request->ten_mon;
            $hinh = $request->file('hinh');
            $gia_ban = $request->gia;
            if($request->hasFile('hinh')){
                $mon_an = new mon_an;
                $mon_an->fill([
                    'quan_an_id'=>$idquan,
                    'ten_mon'=>$ten_mon,
                    'gia_ban'=>$gia_ban,
                    'trang_thai'=>1,
                ]);
                $mon_an->save();
                // đặt tên file và kiểu file
                // getClientoriginalName() : lấy tên file cũ
                // getClientOriginalExtension(): lấy đuôi file
                //$file_name = time().Str::random(10).'.'.$hinhnhanhieu->getClientOriginalExtension();
                $file_name = $hinh->getClientoriginalName();
                // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
                $imagePath = $hinh->move(public_path('hinh_mon_an/'.$idquan), $file_name);
                $mon_an->hinh_mon_an = 'hinh_mon_an/'.$idquan.'/'.$file_name;
                $mon_an->save();
            }
            return response()->json([
                'status'=>200,
                'mess'=>  'thêm thành công',
            ]);
        }

    }

    public function edit($id, $idquan){
        $output = '';
        $mon_an  = mon_an::where('quan_an_id','=',$idquan)->find($id);
        $data= [
            'mon_an'=>$mon_an,
            'quan_an_id'=>$idquan,
        ];
        return  view('admin.quanan.monan-sua', $data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'ten_mon' => 'required',
            'hinh' => '',
            'gia' => 'required',
        ], $messages = [
            'required' => ':attribute không được bỏ trống',
            'image' => 'đây không phải là hình ảnh',
            'mimes' => 'hình ảnh phải có đuổi là: jpeg,png,jpg,gif,svg',
            'unique' => 'Tên địa điểm đã tồn tại',
        ],$attribute = [
            'ten_mon' => 'Tên món',
            'hinh'=>'Hình',
            'gia'=>'Giá bán',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $ten_mon = $request->ten_mon;
            $hinh = $request->file('hinh');
            $gia_ban = $request->gia;
            $mon_an = mon_an::find($id);
                $mon_an->fill([
                    'ten_mon'=>$ten_mon,
                    'gia_ban'=>$gia_ban,
                ]);
            $mon_an->save();
            if($request->hasFile('hinh')){

                // đặt tên file và kiểu file
                // getClientoriginalName() : lấy tên file cũ
                // getClientOriginalExtension(): lấy đuôi file
                //$file_name = time().Str::random(10).'.'.$hinhnhanhieu->getClientOriginalExtension();
                $file_name = $hinh->getClientoriginalName();
                // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
                $imagePath = $hinh->move(public_path('hinh_mon_an/'.$mon_an->quan_an_id), $file_name);
                $mon_an->hinh_mon_an = 'hinh_mon_an/'.$mon_an->quan_an_id.'/'.$file_name;
                $mon_an->save();
            }
            return response()->json([
                'status'=>200,
                'mess'=>  'thêm thành công',
            ]);
        }

    }

    public function destroy($id){
        $mon_an  = mon_an::find($id);
        $mon_an->delete();
        return response()->json([
            'status'=>200,
            'mess'=> 'Xóa thành công',
        ]);

    }
}
