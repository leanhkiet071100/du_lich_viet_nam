<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use App\Models\User;
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
        //truy vấn theo with
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
        $ls_loai_goi_du_lich = loai_goi_du_lich::all();
        $data= [
            'pageTitle' => trans('public.create_location'),
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
        ];
        return view('admin.goidulich.goidulich-them', $data);
    }

    public function store(Request $request)
    {

        $rule = [
            'loai-id' => 'required',
            'hinh-goi-du-lich'=>'required',
            'ten' => 'required',
            'quoc-gia'=>'required',
            'noi-khoi-hanh' => 'required',
            'tap-trung' => 'required',
            'so-nguoi-toi-da' => 'required|numeric',
            'gio-khoi-hanh' =>'required',
            'gia' => 'required',
            'ngay-khoi-hanh' => 'required',
            'so-ngay-du-lich'=> 'required|numeric',
            'mota'=> 'required',
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
            'quoc-gia'=>'Quốc gia',
            'noi-khoi-hanh' => 'Nơi khởi hành',
            'tap-trung' => 'Tập trung',
            'so-nguoi-toi-da' => 'Số người tối đa',
            'gio-khoi-hanh' =>'giờ khởi hành',
            'gia' => 'Giá tiền',
            'ngay-khoi-hanh' => 'Ngày khởi hành',
            'so-ngay-du-lich'=> 'Số ngày du lịch',
            'mota'=> 'mô tả',

        ];

        $request->validate($rule, $message, $attribute);
        $data = $request->all();
        $goi_du_lich = new goi_du_lich;
        $goi_du_lich->fill([
            'loai_id'=> $data['loai-id'],
            'ten'=> $data['ten'],
            'quoc_gia'=> $data['quoc-gia'],
            'noi_khoi_hanh'=>$data['noi-khoi-hanh'],
            'tap_trung'=>$data['tap-trung'],
            'so_nguoi_toi_da'=> $data['so-nguoi-toi-da'],
            'gio_khoi_hanh'=> $data['gio-khoi-hanh'],
            'ngay_khoi_hanh'=> $data['ngay-khoi-hanh'],
            'gia'=> str_replace(',', '', $data['gia']),
            'so_ngay_du_lich'=>$data['so-ngay-du-lich'],
            'mo_ta'=>$data['mota'],
            'hinh_goi-du-lich'=>''
        ]);
        $goi_du_lich->save();
        if(!empty($data['hinh-goi-du-lịch'])){
            // đặt tên file và kiểu file
            // getClientoriginalName() : lấy tên file cũ
            // getClientOriginalExtension(): lấy đuôi file
            $file_name = $data['hinh-goi-du-lịch']->getClientoriginalName();
            // move:  di chuyển hình ảnh; public_path: tạo  thư mục ; $file_name: tên file
            $imagePath = $goi_du_lich->id->move(public_path('imh/hinh-goi-du-lich/'.$goi_du_lich->id), $file_name);
            $goi_du_lich->hinh_goi_du_lich = 'img/hinh-goi-du-lich/'.$goi_du_lich->id.'/'.$file_name;
        }
        $goi_du_lich->save();
        return Redirect::route('admin.goi-du-lich.index');
    }
}
