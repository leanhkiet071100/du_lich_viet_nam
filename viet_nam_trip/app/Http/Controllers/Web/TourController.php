<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use App\Models\lich_trinh;
use App\Models\phieu_dat;
use App\Models\hoa_don;
use App\Models\danh_sach_phieu_dat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Web\ThanhToanController;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = goi_du_lich::query();

        $totalbaiviets = $query->count();
        $query= $this->handleFilters($query, $request);
        //$query = goi_du_lich::where('ngay_khoi_hanh', '=','2023-06-08');

        $query= $query->join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich');

        $ls_goi_du_lich = $query->paginate(9);

        $ls_loai_goi_du_lich = loai_goi_du_lich::get();
        $max_tien = goi_du_lich::max('gia_nguoi_lon');
        $noi_khoi_hanh = goi_du_lich::select('noi_khoi_hanh')->distinct()->get();
        $min_tien = goi_du_lich::min('gia_nguoi_lon') ?? 0;
        $day_now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $data= [
            'pageTitle' => "Tour",
            'ls_goi_du_lich' => $ls_goi_du_lich,
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
            'max_tien' => $max_tien,
            'min_tien' => $min_tien,
            'noi_khoi_hanh'=>$noi_khoi_hanh,
            'day_now'=> $day_now,
        ];
        return view('web.tour.tour-ds', $data);
    }

    private function handleFilters($query, $request){
        $loai_tour = $request->get('loai_tour', null);
        $noi_khoi_hanh = $request->get('noi_khoi_hanh', null);
        $ngay_di = $request->get('ngay_di', null);
        $min_tien = $request->get('min_tien', null);
        $max_tien = $request->get('max_tien', null);

        if (!empty($loai_tour)) {
            $query->where('loai_id', '=', 1);
        }
        if (!empty($noi_khoi_hanh)) {
            $query->where('noi_khoi_hanh', 'like', $noi_khoi_hanh);
        }

        return $query;
    }

    public function show($id){
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $goi_du_lich_noi_bats = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->where('noi_bat', 1)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
        $ls_lich_trinh = lich_trinh::where('goi_du_lich_id', $id)->orderBy('ngay_lich_trinh')->get();
        $data= [
            'pageTitle' => $goi_du_lich->ten,
            'goi_du_lich' => $goi_du_lich,
            'ls_lich_trinh' => $ls_lich_trinh,
            'goi_du_lich_noi_bats'=> $goi_du_lich_noi_bats,
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

    public function so_nguoi_con_lai(Request $request, $id){
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $AmoutPerson  = $request->AmoutPerson;

        if($goi_du_lich->so_nguoi_con_lai == null){
            if($AmoutPerson <= $goi_du_lich->so_nguoi_toi_da){
                return response()->json([
                    'status' => 200,
                    'mess'=>'Thêm thành công',
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'mess'=> 'Tour đã đủ người',
                ]);
            }
        }else{
            if($AmoutPerson <= $goi_du_lich->so_nguoi_con_lai){
                return response()->json([
                    'status' => 200,
                    'mess'=>'Thêm thành công',
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'mess'=>'Đã đủ người',
                ]);
            }
        }

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
        $data_input = $request->all();
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        if($data_input['option'] == "tu_van"){
            $data_input['adult'] = 0;
            $data_input['children'] = 0;
            $data_input['smallchildren'] = 0;
        }
        $so_nguoi_con_lai;
        $tong = ($data_input['adult']* $goi_du_lich->gia_nguoi_lon) + ($data_input['children']* $goi_du_lich->gia_tre_em) + ($data_input['smallchildren']* $goi_du_lich->gia_tre_nho);
        $so_nguoi = ($data_input['adult'] + $data_input['children'] + $data_input['smallchildren']);
        if($goi_du_lich->so_nguoi_con_lai == null){
             $so_nguoi_con_lai = ($goi_du_lich->so_nguoi_toi_da - $so_nguoi);
        }else{
             $so_nguoi_con_lai = ($goi_du_lich->so_nguoi_con_lai -  $so_nguoi);
        }
        $ngay_dat = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $phieu_dat = new phieu_dat;
        $phieu_dat->fill([
            'nguoi_dung_id'=>Auth::user()->id,
            'goi_du_lich_id'=>$id,
            'ten'=>$data_input['Fullname'],
            'email'=>$data_input['Email'],
            'so_dien_thoai'=>$data_input['Telephone'],
            'ngay_dat'=>$ngay_dat,
            'dia_chi'=>$data_input['Address'],
            'so_tre_em'=>$data_input['children'],
            'so_tre_nho'=>$data_input['smallchildren'],
            'so_nguoi_lon'=>$data_input['adult'],
            'ghi_chu'=>$data_input['note'],
            'tu_van'=>$data_input['option'] == 'tu_van' ? 1 : 0,
            'trang_thai'=>1,
        ]);
        $phieu_dat->save();
        $goi_du_lich->update([
            'so_nguoi_con_lai'=>$so_nguoi_con_lai,
        ]);
        if($data_input['option'] == "not_tu_van"){
        for($i = 0; $i < $data_input['adult']; $i++){
            $ds_phieu = new danh_sach_phieu_dat;
            $ds_phieu->fill([
                'phieu_dat_id'=>$phieu_dat->id,
                'ho_ten'=>$data_input[$i.'_fullname'],
                'gioi_tinh'=>$data_input[$i.'_gender'],
                'ngay'=>$data_input[$i.'_day'],
                'thang'=>$data_input[$i.'_month'],
                'nam'=>$data_input[$i.'_year'],
                'loai'=>'nguoi-lon',
            ]);
            $ds_phieu->save();
        }
        for($i = 0; $i < $data_input['children']; $i++){
            $ds_phieu = new danh_sach_phieu_dat;
            $ds_phieu->fill([
                'phieu_dat_id'=>$phieu_dat->id,
                'ho_ten'=>$data_input[$i.'_fullname_tre_em'],
                'gioi_tinh'=>$data_input[$i.'_gender_tre_em'],
                'ngay'=>$data_input[$i.'_day_tre_em'],
                'thang'=>$data_input[$i.'_month_tre_em'],
                'nam'=>$data_input[$i.'_year_tre_em'],
                'loai'=>'tre-em',
            ]);
            $ds_phieu->save();
        }
        for($i = 0; $i < $data_input['smallchildren']; $i++){
            $ds_phieu = new danh_sach_phieu_dat;
            $ds_phieu->fill([
                'phieu_dat_id'=>$phieu_dat->id,
                'ho_ten'=>$data_input[$i.'_fullname_tre_nho'],
                'gioi_tinh'=>$data_input[$i.'_gender_tre_nho'],
                'ngay'=>$data_input[$i.'_day_tre_nho'],
                'thang'=>$data_input[$i.'_month_tre_nho'],
                'nam'=>$data_input[$i.'_year_tre_nho'],
                'loai'=>'tre-nho',
            ]);
            $ds_phieu->save();
        }

        $data= [
            'pageTitle' => "Tour",
            'goi_du_lich' => $goi_du_lich,
            'tong_hoa_don'=> $tong,
            'data_input' => $data_input,
            'so_nguoi' => $so_nguoi,
            'phieu_dat'=>$phieu_dat,
        ];
        return view('web.tour.thanh-toan', $data);
        }else{
            return Redirect::route('web.tai-khoan.phieu-dat-chi-tiet',['id'=> $phieu_dat->id])->with(['yes'=>'Chúng tôi sẽ liên hệ với bạn sớm nhất có thể']);
        }
    }

    public function post_thanh_toan(Request $request ,ThanhToanController $thanh_toan, $id, $phieu_dat_id){
        $data = $request->all();
        $ngay_thanh_toan = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $phieu_dat = phieu_dat::find($phieu_dat_id);
        $tong_hoa_don = ($phieu_dat->so_nguoi_lon* $goi_du_lich->gia_nguoi_lon) + ($phieu_dat->so_tre_em* $goi_du_lich->gia_tre_em) + ($phieu_dat->so_tre_nho* $goi_du_lich->gia_tre_nho);
        if($data['payments'] == 'tienmat'){
            $hoa_don = new hoa_don;
            $hoa_don->fill([
                'phieu_dat_id'=>$phieu_dat_id,
                'tong_tien'=>$tong_hoa_don,
                'loai_thanh_toan'=>'tien-mat',
                'trang_thai'=> 0,
            ]);
            $hoa_don->save();
        return Redirect::route('web.tai-khoan.phieu-dat-chi-tiet', ['id' =>  $phieu_dat_id])->with(['yes'=>'Đặt tour thành công']);
        }else if($data['payments'] == 'momo_atm'){
            return $thanh_toan->momo_atm($tong_hoa_don);
        }else if($data['payments'] == 'momo_pay'){
            return $thanh_toan->momo_pay($tong_hoa_don);
        }else if($data['payments'] == 'vn_pay'){
            return $thanh_toan->VN_pay($goi_du_lich->id,$phieu_dat->id,$tong_hoa_don, $data['redirect']);
        }
    }
}
