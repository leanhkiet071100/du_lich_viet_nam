<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loai_goi_du_lich;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

class LoaiGoiDuLichController extends Controller
{
    public function index(Request $request)
    {
        $query = loai_goi_du_lich::query();
        $query= $this->handleFilters($query, $request);
        $ls_loai_dia_diem = $query->paginate(15);

        $data = [
            'pageTitle' => trans('public.travel_packages'),
            'title'=>trans('public.manage_category_travel_packages'),
            'ls_loai_dia_diem'=>$ls_loai_dia_diem,
        ];
        return view('admin.loaigoidulich.loaigoidulich-ds', $data);
    }

     private function handleFilters($query, $request){
        $search = $request->get('search', null);

        if (!empty($search)) {
            $query->where('ten', 'like', '%' . $search . '%');
        }

        return $query;
    }

    public function load(){
        $lsnhanhieu = loai_dia_diem::orderByRaw('id DESC')->get();
        return response()->json(['lsnhanhieu' => $lsnhanhieu]);
    }

    public function create(){
        return  view('admin.loaigoidulich.loaigoidulich-them');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'tennhanhieu' => 'required|unique:loai_goi_du_liches,ten',
            'hinhnhanhieu' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], $messages = [
            'tennhanhieu.required' => 'Tên loại gói du lịch không được bỏ trống',
            'hinhnhanhieu.image' => 'đây không phải là hình ảnh',
            'hinhnhanhieu.mimes' => 'hình ảnh phải có đuổi là: jpeg,png,jpg,gif,svg',
            'hinhnhanhieu.required' => 'Hình loại gói du lịch không được bỏ trống',
            'tennhanhieu.unique' => 'Tên địa điểm đã tồn tại',

        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $tennhanhieu = $request->tennhanhieu;
            $hinhnhanhieu = $request->file('hinhnhanhieu');
            if($request->hasFile('hinhnhanhieu')){
                $nhanhieu = new loai_goi_du_lich;
                $nhanhieu->fill([
                    'ten'=>$tennhanhieu,
                    'hien'=>1,
                ]);
                $nhanhieu->save();
                $idnhanhieu = $nhanhieu->id;

                // đặt tên file và kiểu file
                // getClientoriginalName() : lấy tên file cũ
                // getClientOriginalExtension(): lấy đuôi file
                //$file_name = time().Str::random(10).'.'.$hinhnhanhieu->getClientOriginalExtension();
                $file_name = $hinhnhanhieu->getClientoriginalName();
                // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
                $imagePath = $hinhnhanhieu->move(public_path('img/hinh_loai_goi_du_lich/'.$idnhanhieu), $file_name);
                $nhanhieu->hinh_loai_goi_du_lich = 'img/hinh_loai_goi_du_lich/'.$idnhanhieu.'/'.$file_name;
                $nhanhieu->save();
            }
            return response()->json([
                'status'=>200,
                'mess'=>  'thêm thành công',
            ]);
        }

    }

    public function edit($id){
        $output = '';
        $nhanhieu  = loai_goi_du_lich::find($id);
        return  view('admin.loaigoidulich.loaigoidulich-sua')->with(['nhanhieu'=>$nhanhieu]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'tennhanhieu' => 'required',
            'hinhnhanhieu' => '',
        ], $messages = [
            'tennhanhieu.required' => 'Tên loại gói du lịch không được bỏ trống',
            'hinhnhanhieu.image' => 'đây không phải là hình ảnh',
            'hinhnhanhieu.mimes' => 'hình ảnh phải có đuổi là: jpeg,png,jpg,gif,svg',
            'hinhnhanhieu.required' => 'Hình loại gói du lịch không được bỏ trống',
            'tennhanhieu.unique' => 'Tên địa điểm đã tồn tại',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $tennhanhieu = $request->tennhanhieu;
            $hinhnhanhieu = $request->file('hinhnhanhieu');
            $date = Carbon::now();
            //$date = $date->format('dmYhis'); // ngày tháng năm giờ phút giây
            $date = $date->format('dmy');
            $nhanhieu = loai_goi_du_lich::find($id);
            $nhanhieu->ten = $tennhanhieu;
            if($request->hasFile('hinhnhanhieu')){
                $idnhanhieu = $nhanhieu->id;
                // đặt tên file và kiểu file
                // getClientoriginalName() : lấy tên file cũ
                // getClientOriginalExtension(): lấy đuôi file
                $file_name = $date.$hinhnhanhieu->getClientoriginalName();
                // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
                $imagePath = $hinhnhanhieu->move(public_path('img/hinh_loai_goi_du_lich/'.$idnhanhieu), $file_name);
                $nhanhieu->hinh_loai_goi_du_lich = 'img/hinh_loai_goi_du_lich/'.$idnhanhieu.'/'.$file_name;
            }
            $nhanhieu->save();
            return response()->json([
                'status'=>200,
                'mess'=>  'sửa thành công',
            ]);
        }

    }

    public function destroy($id){
        $loai_dia_diem  = loai_goi_du_lich::find($id);
        $loai_dia_diem->delete();
        return response()->json([
            'status'=>200,
            'mess'=> 'Xóa thành công',
        ]);

    }

}
