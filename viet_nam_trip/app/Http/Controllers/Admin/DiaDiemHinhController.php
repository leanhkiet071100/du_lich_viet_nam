<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dia_diem;
use App\Models\loai_dia_diem;
use App\Models\User;
use App\Models\tinh_huyen_xa;
use App\Models\dia_diem_hinh;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DiaDiemHinhController extends Controller
{
    //hình sản phẩm
    public function index($id){
        $dia_diem = dia_diem::find($id);
        $ls_dia_diem_hinh = dia_diem_hinh::where('dia_diem_id','=',$id)->get();
        $data= [
            'pageTitle' => "Hình địa điểm",
            'dia_diem' => $dia_diem,
            'ls_dia_diem_hinh'=> $ls_dia_diem_hinh,
        ];
        return view('admin.diadiem.diadiem-hinh', $data);
    }

    //load hình sản phẩm
    public function load_hinh($id){
        $hinh = dia_diem_hinh::where('dia_diem_id','=',$id)->get();
        return response()->json(['hinh' => $hinh]);
    }

    public function destroy($id){
        $hinh  = dia_diem_hinh::find($id);
        $hinh->delete();
        return response()->json([
            'status'=>200,
            'mess'=> 'Xóa thành công',
        ]);
    }

    //hình ảnh sản phẩm
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'hinh' => 'required',
        ], $messages = [
            'required' => 'Chưa có hình ảnh',

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $id = $request->dia_diem_id;
            $hinh = $request->file('hinh');
            //mảng kiển tra hình
            $allowedfileExtension=['jpg','png', 'jpeg', 'svg', 'PNG', 'JPG', 'JPEG','SVG'];
            if($hinh!=null){
                foreach($hinh as $key=>$value){
                    //lấy đuôi file
                    $typefile = $value->getClientOriginalExtension();
                    $check=in_array($typefile,$allowedfileExtension);
                    if(!$check)
                    {
                        return response()->json([
                            'status'=>200,
                            'mess'=>'Đây không phải hình ảnh',
                        ]);
                    }
                    else{
                        $file_name = time().Str::random(10).'.'.$value->getClientOriginalExtension();
                        $imagePath = $value->move(public_path('ls_hinh_dia_diem/'.$id.'/'), $file_name);
                        $ten_file = 'ls_hinh_dia_diem/'.$id.'/'.$file_name;
                        dia_diem_hinh::create([
                            'dia_diem_id'=>$id,
                            'ten' =>$ten_file,
                            'trang_thai'=> 1,
                        ]);
                    }
                }
            }
            return response()->json([
                'status'=>200,
                'mess'=>'thêm hình ảnh thành công',
            ]);
        }
    }
}
