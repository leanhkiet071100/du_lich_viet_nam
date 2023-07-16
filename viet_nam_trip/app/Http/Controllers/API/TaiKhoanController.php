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

class TaiKhoanController extends Controller
{
         // quản lí đơn hàng
         public function phieu_dat(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->join('goi_du_liches','goi_du_liches.id', '=' ,'phieu_dats.goi_du_lich_id')
                                ->join('hoa_dons','hoa_dons.phieu_dat_id','=', 'phieu_dats.id')
                                ->select('phieu_dats.id','phieu_dats.ten','phieu_dats.email','phieu_dats.so_dien_thoai','phieu_dats.ngay_dat', 'phieu_dats.trang_thai', 'phieu_dats.goi_du_lich_id', 
                                        'hoa_dons.tong_tien', 'hoa_dons.loai_thanh_toan',
                                        'goi_du_liches.ten as ten_du_lich', 'goi_du_liches.hinh_goi_du_lich as hinh_anh', 'goi_du_liches.ngay_khoi_hanh' )
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Phiếu đặt",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            // return view('web.nguoidung.phieu-dat.phieu-dat-all', $data);
        }
        public function phieu_dat_cho_duyet(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->where('trang_thai', 1)
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Tour chờ duyệt",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-cho-duyet', $data);
        }
    
        public function phieu_dat_da_duyet(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->where('trang_thai', 2)
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Tour đã duyệt",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-da-duyet', $data);
        }
    
        public function phieu_dat_duyet_huy(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->where('trang_thai', 3)
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Tour duyệt hủy",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-duyet-huy', $data);
        }
    
        public function phieu_dat_hoan_thanh(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->where('trang_thai', 5)
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Tour hoàn thành",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-hoan-thanh', $data);
        }
    
        public function phieu_dat_huy(Request $request){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->where('trang_thai', 4)
                                ->orderByRaw('id DESC')
                                ->get();
            $data= [
                'pageTitle' => "Tour hủy",
                'phieu_dat' => $phieu_dat,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-huy', $data);
        }
    
        public function phieu_dat_chi_tiet (Request $request, $id){
            $iduser =auth()->user()->id;
            $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
            ->join('goi_du_liches','goi_du_liches.id', '=' ,'phieu_dats.goi_du_lich_id')
            ->join('hoa_dons','hoa_dons.phieu_dat_id','=', 'phieu_dats.id')
            ->select('phieu_dats.id','phieu_dats.ten','phieu_dats.email','phieu_dats.so_dien_thoai','phieu_dats.ngay_dat', 'phieu_dats.trang_thai', 'phieu_dats.goi_du_lich_id', 
                    'hoa_dons.tong_tien', 'hoa_dons.loai_thanh_toan',
                    'goi_du_liches.ten as ten_du_lich', 'goi_du_liches.hinh_goi_du_lich as hinh_anh', 'goi_du_liches.ngay_khoi_hanh' )
                                ->orderByRaw('id DESC')
                                ->find($id);
            $ds_nguoi_tham_gia = danh_sach_phieu_dat::where('phieu_dat_id','=',$id)->get();
            // $danh_gia = goi_du_lich_binh_luan::where('nguoi_dung_id','=',$iduser)
            //                                     ->where('goi_du_lich_id','=',$phieu_dat->goi_du_lich->id)
            //                                     ->first();
            $data= [
                'pageTitle' => "Phiếu đặt",
                'phieu_dat' => $phieu_dat,
                'ds_nguoi_tham_gia'=>$ds_nguoi_tham_gia,
                //'danh_gia'=>$danh_gia,
            ];
            return response()->json($phieu_dat);
            return view('web.nguoidung.phieu-dat.phieu-dat-chi-tiet', $data);
    
        }
}
