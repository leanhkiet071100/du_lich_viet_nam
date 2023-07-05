<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use App\Models\lich_trinh;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

class LichTrinhController extends Controller
{
    public function create($id_tour)
    {
       $data= [
            'pageTitle' => 'Tạo lịch trình',
            'id_tour' => $id_tour,
        ];
        return view('admin.goidulich.lichtrinh-them', $data);
    }

    public function store(Request $request, $id_tour)
    {
        $rule = [
            'ten' => 'required',
            'noi-dung'=> 'required',
            'ngay-lich-trinh'=> 'required|date',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
        ];
        $attribute = [
            'ngay-lich-trinh' => 'Ngày lịch trình',
            'ten' => 'Tên lịch trình',
            'noi-dung' => 'nội dung',
        ];

        $request->validate($rule, $message, $attribute);
        $data = $request->all();

        $lich_trinh = new lich_trinh;
        $lich_trinh->fill([
            'ten'=> $data['ten'],
            'noi_dung'=>$data['noi-dung'],
            'ngay_lich_trinh'=>$data['ngay-lich-trinh'],
            'goi_du_lich_id'=>$id_tour
        ]);
        $lich_trinh->save();
        return Redirect::route('admin.goi-du-lich.edit',['id' => $id_tour])->with('success', 'Thêm lịch trình thành công');;
    }

    public function edit(Request $request, $id, $id_tour)
    {
        $lich_trinh = lich_trinh::where('goi_du_lich_id', $id_tour)->find($id);
        $data= [
            'pageTitle' => $lich_trinh->ten,
            'id_tour' => $id_tour,
            'lich_trinh' => $lich_trinh,
        ];
        return view('admin.goidulich.lichtrinh-sua', $data);
    }

    public function update(Request $request, $id, $id_tour)
    {
       $rule = [
            'ten' => 'required',
            'noi-dung'=> 'required',
            'ngay-lich-trinh'=> 'required|date',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
        ];
        $attribute = [
            'ngay-lich-trinh' => 'Ngày lịch trình',
            'ten' => 'Tên lịch trình',
            'noi-dung' => 'nội dung',
        ];

        $request->validate($rule, $message, $attribute);
        $data = $request->all();

        $lich_trinh = lich_trinh::where('goi_du_lich_id', $id_tour)->find($id);
        $lich_trinh->fill([
            'ten'=> $data['ten'],
            'noi_dung'=>$data['noi-dung'],
            'ngay_lich_trinh'=>$data['ngay-lich-trinh'],
        ]);
        $lich_trinh->save();
        return Redirect::route('admin.goi-du-lich.edit',['id' => $id_tour])->with('success', 'Sửa lịch trình thành công');
    }

    public function destroy($id)
    {
        $quan_an = quan_an::find($id);
        $quan_an->delete();
        return Redirect::route('admin.quan-an.index')->with('success','Xóa thành công');
    }
}
