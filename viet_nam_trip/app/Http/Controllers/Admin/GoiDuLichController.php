<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use App\Models\lich_trinh;
use App\Models\User;
use App\Models\phieu_dat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

class GoiDuLichController extends Controller
{
    public function index(Request $request)
    {
        $query = goi_du_lich::query();
        $totalbaiviets = $query->count();
        $user = User::all();
        //$query= $this->handleFilters($query, $request);
        $lsgoidulich = $query->join('loai_goi_du_liches','loai_goi_du_liches.id','=','goi_du_liches.loai_id')
                            ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                            ->paginate(10);


        $data= [
            'pageTitle' => trans('public.travel_packages'),
            'lsgoidulich' => $lsgoidulich,
            'user'=> $user,
        ];
        return view('admin.goidulich.goidulich-ds',$data);
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

    public function create()
    {
         $date_now = Carbon::now()->format('Y-m-d');
        $ls_loai_goi_du_lich = loai_goi_du_lich::all();
        $data= [
            'pageTitle' => trans('public.create_location'),
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
            'date_now' => $date_now,
        ];
        return view('admin.goidulich.goidulich-them', $data);
    }

    public function store(Request $request)
    {
        $rule = [
            'loai-id' => 'required',
            'hinh-goi-du-lich'=>'required|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'ten' => 'required',
            'noi-khoi-hanh' => 'required',
            'tap-trung' => 'required',
            'so-nguoi-toi-da' => 'required|numeric',
            'gio-khoi-hanh' =>'required',
            'gia-nguoi-lon' => 'required',
            'gia-tre-em' => 'required',
            'gia-tre-nho' => 'required',
            'ngay-khoi-hanh' => 'required',
            'so-ngay-du-lich'=> 'required|numeric',
            'so-dem-du-lich'=> 'required|numeric',
            'thong-tin-dich-vu'=> 'required',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            //'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',

        ];
        $attribute = [
            'loai-id' => 'loại du lich',
            'hinh-goi-du-lich'=>'Hình gói du lịch',
            'ten' => 'Tên gói du lịch',
            'noi-khoi-hanh' => 'Nơi khởi hành',
            'tap-trung' => 'thời gian tập trung',
            'so-nguoi-toi-da' => 'Số người tối đa',
            'gio-khoi-hanh' =>'giờ khởi hành',
            'ngay-khoi-hanh' => 'Ngày khởi hành',
            'mota'=> 'mô tả',
            'so-nguoi-toi-da' => 'required|numeric',
            'gio-khoi-hanh' =>'required',
            'gia-nguoi-lon' => 'giá người lớn',
            'gia-tre-em' => 'giá trẻ em',
            'gia-tre-nho' => 'giá trẻ nhỏ',
            'so-ngay-du-lich'=> 'Số ngày du lịch',
            'so-dem-du-lich'=> 'Số đêm du lịch',
            'thong-tin-dich-vu'=> 'Thông tin dịch vụ',
        ];

        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $goi_du_lich = new goi_du_lich;
        $goi_du_lich->fill([
            'loai_id'=> $data['loai-id'],
            'ten'=> $data['ten'],
            'noi_khoi_hanh'=>$data['noi-khoi-hanh'],
            'thoi_gian_tap_trung'=>$data['tap-trung'],
            'so_nguoi_toi_da'=> $data['so-nguoi-toi-da'],
            'gio_khoi_hanh'=> $data['gio-khoi-hanh'],
            'ngay_khoi_hanh'=> $data['ngay-khoi-hanh'],
            'gia_nguoi_lon'=> str_replace(',', '', $data['gia-nguoi-lon']),
            'gia_tre_em'=> str_replace(',', '', $data['gia-tre-em']),
            'gia_tre_nho'=> str_replace(',', '', $data['gia-tre-nho']),
            'so_ngay'=>$data['so-ngay-du-lich'],
            'so_dem'=>$data['so-dem-du-lich'],
            //'not_compo'=>$data['not-compo'],
            // 'compo'=>$data['compo'],
            'thong_tin_dich_vu'=>$data['thong-tin-dich-vu'],
            // 'dieu_kien_ap_dung'=>$data['dieu-kien-ap-dung'],
            'trang_thai'=>1,
        ]);
        $goi_du_lich->save();
        if(!empty($data['hinh-goi-du-lich'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh-goi-du-lich']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath =  $data['hinh-goi-du-lich']->move(public_path('img/hinh-goi-du-lich/'.$goi_du_lich->id), $file_name);
            $goi_du_lich->hinh_goi_du_lich = 'img/hinh-goi-du-lich/'.$goi_du_lich->id.'/'.$file_name;
        }
        $goi_du_lich->save();

        return Redirect::route('admin.goi-du-lich.index');
    }

    public function noi_nat(Request $request,$id){
        $check = $request->check;
        $sanpham = goi_du_lich::find($id);
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

    public function edit($id)
    {
        $goi_du_lich = goi_du_lich::find($id);
        $ls_loai_goi_du_lich = loai_goi_du_lich::all();
        $ls_lich_trinh = lich_trinh::where('goi_du_lich_id', '=', $id)->orderBy('ngay_lich_trinh')->paginate(10);
        $data= [
            'pageTitle' => $goi_du_lich->ten,
            'goi_du_lich' => $goi_du_lich,
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
            'ls_lich_trinh' => $ls_lich_trinh,
        ];
        return view('admin.goidulich.goidulich-sua', $data);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'loai-id' => 'required',
            'hinh-goi-du-lich'=>'mimes:jpeg,png,jpg,gif,svg|max:500000',
            'ten' => 'required',
            'noi-khoi-hanh' => 'required',
            'tap-trung' => 'required',
            'so-nguoi-toi-da' => 'required|numeric',
            'gio-khoi-hanh' =>'required',
            'gia-nguoi-lon' => 'required',
            'gia-tre-em' => 'required',
            'gia-tre-nho' => 'required',
            'ngay-khoi-hanh' => 'required',
            'so-ngay-du-lich'=> 'required|numeric',
            'so-dem-du-lich'=> 'required|numeric',
            // 'not-compo'=> 'required',
            // 'compo'=> 'required',
            'thong-tin-dich-vu'=> 'required',
            //'dieu-kien-ap-dung'=> 'required',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min', // lớn hơn  (không phải độ dài)
            'max' => ':attribute phải nhỏ hơn :max', // nhỏ hơn
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            //'image' => ':attribute không đúng định dạng',
            'mimes' => ':attribute không đúng định dạng',

        ];
        $attribute = [
            'loai-id' => 'loại du lich',
            'hinh-goi-du-lich'=>'Hình gói du lịch',
            'ten' => 'Tên gói du lịch',
            'noi-khoi-hanh' => 'Nơi khởi hành',
            'tap-trung' => 'thời gian tập trung',
            'so-nguoi-toi-da' => 'Số người tối đa',
            'gio-khoi-hanh' =>'giờ khởi hành',
            'ngay-khoi-hanh' => 'Ngày khởi hành',
            'mota'=> 'mô tả',
            'so-nguoi-toi-da' => 'required|numeric',
            'gio-khoi-hanh' =>'required',
            'gia-nguoi-lon' => 'giá người lớn',
            'gia-tre-em' => 'giá trẻ em',
            'gia-tre-nho' => 'giá trẻ nhỏ',
            'so-ngay-du-lich'=> 'Số ngày du lịch',
            'so-dem-du-lich'=> 'Số đêm du lịch',
            // 'not-compo'=> 'Không có trong compo',
            // 'compo'=> 'Compo',
            'thong-tin-dich-vu'=> 'Thông tin dịch vụ',
            //'dieu-kien-ap-dung'=> 'Điều kiện áp dụng',
        ];

        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $goi_du_lich = goi_du_lich::find($id);
        $goi_du_lich->fill([
            'loai_id'=> $data['loai-id'],
            'ten'=> $data['ten'],
            'noi_khoi_hanh'=>$data['noi-khoi-hanh'],
            'thoi_gian_tap_trung'=>$data['tap-trung'],
            'so_nguoi_toi_da'=> $data['so-nguoi-toi-da'],
            'gio_khoi_hanh'=> $data['gio-khoi-hanh'],
            'ngay_khoi_hanh'=> $data['ngay-khoi-hanh'],
            'gia_nguoi_lon'=> str_replace(',', '', $data['gia-nguoi-lon']),
            'gia_tre_em'=> str_replace(',', '', $data['gia-tre-em']),
            'gia_tre_nho'=> str_replace(',', '', $data['gia-tre-nho']),
            'so_ngay'=>$data['so-ngay-du-lich'],
            'so_dem'=>$data['so-dem-du-lich'],
            // 'not_compo'=>$data['not-compo'],
            // 'compo'=>$data['compo'],
            'thong_tin_dich_vu'=>$data['thong-tin-dich-vu'],
            // 'dieu_kien_ap_dung'=>$data['dieu-kien-ap-dung'],
            'trang_thai'=>1,
        ]);
        $goi_du_lich->save();
        if(!empty($data['hinh-goi-du-lich'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh-goi-du-lich']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath =  $data['hinh-goi-du-lich']->move(public_path('img/hinh-goi-du-lich/'.$goi_du_lich->id), $file_name);
            $goi_du_lich->hinh_goi_du_lich = 'img/hinh-goi-du-lich/'.$goi_du_lich->id.'/'.$file_name;
        }
        $goi_du_lich->save();
        return Redirect::route('admin.goi-du-lich.index');
    }

    public function tour_hoan_thanh(Request $request, $id)
    {
        $ngay_hien_tai = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $goi_du_lich = goi_du_lich::find($id);
        $phieu_dats = phieu_dat::where('trang_thai', 2)->where('goi_du_lich_id', $id)->get();
        $goi_du_lich->update([
            'trang_thai'=>3,
        ]);
        foreach($phieu_dats as $key=>$value)
        {
            if($value->trang_thai ==2){
            $value->update([
                'trang_thai'=> 5,
            ]);
            }
        }

        return Redirect::route('admin.goi-du-lich.index')->with('yes', 'gói du lịch đã hoàn thành');
    }

    public function destroy($id)
    {
        $goi_du_lich = goi_du_lich::find($id);
        $goi_du_lich->delete();
        return Redirect::route('admin.goi-du-lich.index')->with('success','Xóa thành công');
    }
}
