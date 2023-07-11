<?php

namespace App\Http\Controllers\API;

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
use App\Http\Controllers\API\ThanhToanController;

class TourController extends Controller
{
    public function dat_tour(Request $request){
        $rule = [
            'Fullname' => 'required',
            'Email'=>'required|email',
            'Telephone' => 'required|numeric',
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
            'adult' => 'người lớn',
        ];
        $request->validate($rule, $message, $attribute);

        $input['Fullname'] = $request->input('Fullname');
        $input['Email'] = $request->input('Email');
        $input['Telephone'] = $request->input('Telephone');
        $input['adult'] = $request->input('adult');
        $input['children'] = $request->input('children');
        $input['goi_du_lich_id'] = $request->input('goi_du_lich_id');

        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($input['goi_du_lich_id']);

        $tong = ($input['adult'] * $goi_du_lich->gia_nguoi_lon) + ($input['children'] *  $goi_du_lich->gia_tre_em);
        $so_nguoi = ($input['adult'] + $input['children']);
        $ngay_dat = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $phieu_dat = new phieu_dat;
        $phieu_dat->fill([
            'nguoi_dung_id'=>auth()->user()->id,
            'goi_du_lich_id'=>$goi_du_lich->id,
            'ten'=>$input['Fullname'],
            'email'=>$input['Email'],
            'so_dien_thoai'=>$input['Telephone'],
            'ngay_dat'=>$ngay_dat,
            'so_tre_em'=>$input['children'],
            'so_nguoi_lon'=>$input['adult'],
            'trang_thai'=>1,
        ]);
        $phieu_dat->save();

      $response=
        [
            'message'=>'Đặt tour thành công',
            // 'user'=>auth()->user(),
            'phieu_dat'=>$phieu_dat,
        ];
        return response()->json($response,200);
    }

    public function thanh_toan(Request $request ,ThanhToanController $thanh_toan){
        $ngay_thanh_toan = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $input['phieu_dat_id'] = $request->input('phieu_dat_id');
        $input['payments'] = $request->input('payments');
        $phieu_dat = phieu_dat::find($input['phieu_dat_id']);
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($phieu_dat->goi_du_lich_id);
        $tong_hoa_don = ($phieu_dat->so_nguoi_lon* $goi_du_lich->gia_nguoi_lon) + ($phieu_dat->so_tre_em* $goi_du_lich->gia_tre_em);
        if( $input['payments'] == 'tienmat'){
            $hoa_don = new hoa_don;
            $hoa_don->fill([
                'phieu_dat_id'=>$phieu_dat->id,
                'tong_tien'=>$tong_hoa_don,
                'loai_thanh_toan'=>'tien-mat',
                'trang_thai'=> 2,
            ]);
            $hoa_don->save();
        $response=
        [
            'message'=>'Thanh toán thành công',
            'phieu_dat'=>$phieu_dat,
        ];
        return response()->json($response,200);
        }else if($data['payments'] == 'momo_atm'){
            return $thanh_toan->momo_atm($tong_hoa_don);
        }else if($data['payments'] == 'momo_pay'){
            return $thanh_toan->momo_pay($tong_hoa_don);
        }else if($data['payments'] == 'vn_pay'){
            return $thanh_toan->VN_pay($goi_du_lich->id,$phieu_dat->id,$tong_hoa_don, $data['redirect']);
        }
    }
}
