<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phieu_dat;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PhieuDatController extends Controller
{
        public function index(Request $request){
            $phieu_dat = phieu_dat::select('phieu_dats.*')
                                    ->with(['hoa_don', 'goi_du_lich'])
                                    ->get();
            $data= [
                'pageTitle' => "Phiếu đặt",
                'phieu_dat' => $phieu_dat,
            ];
            return view('admin.phieu-dat.phieudat-ds', $data);
    }

    public function don_hang_chi_tiet($id){
        $donhang_chitiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->where('ma_hoa_don','=',$id)
                            ->get();
        $don_hang = hoadon::join('nguoidungs','nguoidungs.id', '=','hoadons.ma_nguoi_dung')
                        ->select('hoadons.*', 'nguoidungs.email')
                        ->find($id);
        return view('admin.donhang.donhang-chitiet')->with(['donhang_chitiet'=>$donhang_chitiet,  'don_hang'=>$don_hang]);
    }

    public function don_hang_chuc_nang($id){
        $don_hang = hoadon::find($id);
        $don_hang->fill(['trang_thai' => $don_hang->trang_thai + 1 ]);
        $don_hang->save();
        return response()->json([
                'status'=>200,
                'mess'=>  'Sửa thành công',
                'don_hang'=>$don_hang,
            ]);
    }
}
