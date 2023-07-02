<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use App\Models\lich_trinh;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Cookie;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = goi_du_lich::query();
        $totalbaiviets = $query->count();
        $query= $this->handleFilters($query, $request);
        $query= $query->join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich');
        $ls_goi_du_lich = $query->paginate(9);
        $ls_loai_goi_du_lich = loai_goi_du_lich::get();
        $max_tien = goi_du_lich::max('gia_nguoi_lon');
        $min_tien = goi_du_lich::min('gia_nguoi_lon');
        $data= [
            'pageTitle' => "Tour",
            'ls_goi_du_lich' => $ls_goi_du_lich,
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
            'max_tien' => $max_tien,
            'min_tien' => $min_tien,
        ];
        return view('web.tour.tour-ds', $data);
    }

    private function handleFilters($query, $request){
        $ten = $request->get('ten', null);
        $mua_du_lich = $request->get('mua-du-lich', null);
        $tinh = $request->get('tinh', null);
        $huyen = $request->get('huyen', null);
        $xa = $request->get('xa', null);
        $sao_1 = $request->get('sao-1', null);
        $sao_2 = $request->get('sao-2', null);
        $sao_3 = $request->get('sao-3', null);
        $sao_4 = $request->get('sao-4', null);
        $sao_5 = $request->get('sao-5', null);
        $sao = [];
        if (!empty($ten)) {
            $query->where('ten_dia_diem', 'like', '%' . $ten . '%');
        }
        if (!empty($mua_du_lich)) {
            $query->where('mua_du_lich', 'like', '%' . $mua_du_lich . '%');
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
        if (!empty($sao_1)) {
            $sao[] = 1;
        }
        if (!empty($sao_2)) {
             $sao[] = 2;
        }
        if (!empty($sao_3)) {
             $sao[] = 3;
        }
        if (!empty($sao_4)) {
            $sao[] = 4;
        }
        if (!empty($sao_5)) {
            $sao[] = 5;
        }
        if(!empty($sao_1) || !empty($sao_2) || !empty($sao_3) || !empty($sao_4) || !empty($sao_5)){
        $query->whereIn('sao', $sao);}



        return $query;
    }

    public function show($id){
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $ls_lich_trinh = lich_trinh::where('goi_du_lich_id', $id)->get();
        $data= [
            'pageTitle' => $goi_du_lich->ten,
            'goi_du_lich' => $goi_du_lich,
            'ls_lich_trinh' => $ls_lich_trinh,
        ];
        return view('web.tour.tour-chi-tiet', $data);
    }

    public function booking(Request $request, $id){

        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $year_now = Carbon::now()->format('Y');
        $nam_nguoi_lon = array();
        for($i = 12; $i < 100; $i++)
        {
            $nam = $year_now - $i;
            $nam_nguoi_lon[$i - 12] = $nam;
        }
        $data= [
            'pageTitle' =>'booking'.$goi_du_lich->ten,
            'goi_du_lich' => $goi_du_lich,
            'nam_nguoi_lon' => $nam_nguoi_lon,
        ];
        return view('web.tour.phieu-dat', $data);
    }

    public function load_nguoi_lon(Request $request, $so_luong){
        $year_now = Carbon::now()->format('Y');
        $nam_nguoi_lon = array();
        $thang = array();
        $ngay = array();
        for($i = 1; $i <= 12; $i++)
        {
            $thang[$i] = $i;
        }
        for($i = 1; $i <= 31; $i++)
        {
            $ngay[$i] = $i;
        }
        for($i = 12; $i < 100; $i++)
        {
            $nam = $year_now - $i;
            $nam_nguoi_lon[$i - 12] = $nam;
        }
        $data= [
            'nam_nguoi_lon' => $nam_nguoi_lon,
            'ngay' => $ngay,
            'thang' => $thang,
            'so_luong' => $so_luong,
        ];
        return view('web.tour.thong-tin-lien-lac.nguoi-lon', $data);
    }

    public function load_tre_em(Request $request, $so_luong){
        $year_now = Carbon::now()->format('Y');
        $nam_nguoi_lon = array();
        $thang = array();
        $ngay = array();
        for($i = 1; $i <= 12; $i++)
        {
            $thang[$i] = $i;
        }
        for($i = 1; $i <= 31; $i++)
        {
            $ngay[$i] = $i;
        }
        for($i = 2; $i < 12; $i++)
        {
            $nam = $year_now - $i;
            $nam_tre_em[$i - 12] = $nam;
        }
        $data= [
            'nam_tre_em' => $nam_tre_em,
            'ngay' => $ngay,
            'thang' => $thang,
            'so_luong' => $so_luong,
        ];
        return view('web.tour.thong-tin-lien-lac.tre-em', $data);
    }

    public function load_tre_nho(Request $request, $so_luong){
        $year_now = Carbon::now()->format('Y');
        $nam_nguoi_lon = array();
        $thang = array();
        $ngay = array();
        for($i = 1; $i <= 12; $i++)
        {
            $thang[$i] = $i;
        }
        for($i = 1; $i <= 31; $i++)
        {
            $ngay[$i] = $i;
        }
        for($i = 0; $i < 2; $i++)
        {
            $nam = $year_now - $i;
            $nam_tre_nho[$i - 12] = $nam;
        }
        $data= [
            'nam_tre_nho' => $nam_tre_nho,
            'ngay' => $ngay,
            'thang' => $thang,
            'so_luong' => $so_luong,
        ];
        return view('web.tour.thong-tin-lien-lac.tre-nho', $data);
    }

    public function tong_hoa_don(Request $request, $id){
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $adult  = $request->adult;
        $children  = $request->children;
        $smallchildren  = $request->smallchildren;
        $tong = ($adult* $goi_du_lich->gia_nguoi_lon) + ($children* $goi_du_lich->gia_tre_em) + ($smallchildren* $goi_du_lich->gia_tre_nho);
        return number_format($tong);
    }

    public function thanh_toan(Request $request, $id){
        $rule = [
            'Fullname' => 'required',
            'Email'=>'required|email',
            'Telephone' => 'required|numeric',
            'Address' => 'required',
            'adult' => 'required|min:1',
        ];
        $message =[
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng email',
            'numeric' => ':attribute phải là số',
            'min' => ':attribute tối thiếu là :min',
        ];
        $attribute = [
            'Fullname' => 'Họ và tên',
            'Email'=>'email',
            'Telephone' => 'Số điện thoại',
            'Address' => 'Địa chỉ',
            'adult' => 'người lớn',
        ];
        $request->validate($rule, $message, $attribute);
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $data_input = $request->all();
        $tong = ($data_input['adult']* $goi_du_lich->gia_nguoi_lon) + ($data_input['children']* $goi_du_lich->gia_tre_em) + ($data_input['smallchildren']* $goi_du_lich->gia_tre_nho);
        $so_nguoi = ($data_input['adult'] + $data_input['children'] + $data_input['smallchildren']);
        // $cookie = Cookie::forever('goi_du_lich', 'kiệt');
        // $get_all_cookies = Cookie::get();
        // dd($cookie);

        $data= [
            'pageTitle' => "Tour",
            'goi_du_lich' => $goi_du_lich,
            'tong_hoa_don'=> $tong,
            'data_input' => $data_input,
            'so_nguoi' => $so_nguoi,
        ];
        return view('web.tour.thanh-toan', $data);
    }

    public function post_thanh_toan(Request $request , $id){
        dd('kiệt');
        $data= [
            'pageTitle' => "Tour",
        ];
        return view('web.tour.thanh-toan', $data);
    }
}
