<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phieu_dat;
use App\Models\danh_sach_phieu_dat;
use App\Models\hoa_don;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;


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

    public function form_tour_huy($id){
       $phieu_dat = phieu_dat::join('goi_du_liches','goi_du_liches.id','=','phieu_dats.goi_du_lich_id')
                    ->select('phieu_dats.*', 'goi_du_liches.hinh_goi_du_lich','goi_du_liches.noi_khoi_hanh', 'goi_du_liches.ten')
                    ->find($id);
       $data= [
                'pageTitle' => "form Phiếu huy",
                'phieu_dat' => $phieu_dat,
            ];
        return view('admin.phieu-dat.form-huy-tour', $data);
    }

    public function post_form_tour_huy(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'content_post' => 'required',
        ], $messages = [
            'required' => 'Nội dung không được bỏ trống',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $phieu_dat = phieu_dat::find($id);
            $hoa_don = hoa_don::where('phieu_dat_id', $phieu_dat->id)->first();
            $ngay_huy = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $noi_dung = $request->input('content-post');
            $phieu_dat->update([
                'ngay_huy'=>$ngay_huy,
                'li_do_huy'=>$noi_dung,
                'trang_thai'=> 4,
            ]);

            if($hoa_don == null){
                return response()->json([
                    'status' => 200,
                    'mess'=>'Hủy thành công',
                ]);
            }else{
                if($hoa_don->trang_thai == 0){
                    $hoa_don->update([
                        'trang_thai' => 4,
                    ]);
                }else if($hoa_don->trang_thai == 1){
                    $hoa_don->update([
                        'trang_thai' => 2,
                    ]);
                }

                return response()->json([
                    'status' => 200,
                    'mess'=>'Hủy thành công',
                ]);
            }
        }
    }

    public function duyet(Request $request, $id){
            $phieu_dat = phieu_dat::find($id);
            $hoa_don = hoa_don::where('phieu_dat_id', $phieu_dat->id)->first();
            $phieu_dat->update([
                'nguoi_duyet_id'=>Auth::user()->id,
                'trang_thai'=> 2,
            ]);
            if($hoa_don->trang_thai == 0){
                $hoa_don->update([
                    'trang_thai' => 1,
                ]);
            }
            return response()->json([
                'status' => 200,
                'mess'=>'Duyệt thành công',
            ]);
    }

    public function duyet_huy(Request $request, $id){
            $phieu_dat = phieu_dat::find($id);
            $hoa_don = hoa_don::where('phieu_dat_id', $phieu_dat->id)->first();
            $phieu_dat->update([
                'nguoi_duyet_id'=>Auth::user()->id,
                'trang_thai'=> 4,
            ]);

            if($hoa_don == null){
                return response()->json([
                    'status' => 200,
                    'mess'=>'Duyệt thành công',
                ]);
            }else{
                if($hoa_don->trang_thai == 0){
                    $hoa_don->update([
                        'trang_thai' => 4,
                    ]);
                }else if($hoa_don->trang_thai == 1){
                    $hoa_don->update([
                        'trang_thai' => 2,
                    ]);
                }

                return response()->json([
                    'status' => 200,
                    'mess'=>'Duyệt thành công',
                ]);
            }
    }

     public function hoan_tien (Request $request, $id){
            $phieu_dat = phieu_dat::find($id);
            $hoa_don = hoa_don::where('phieu_dat_id', $phieu_dat->id)->first();

            if($hoa_don == null){
                return response()->json([
                    'status' => 400,
                    'mess'=>'Thấy bại',
                ]);
            }else{
                if($hoa_don->trang_thai == 2){
                    $hoa_don->update([
                        'trang_thai' => 3,
                    ]);
                }
                return response()->json([
                    'status' => 200,
                    'mess'=>'Hoàn trả thành công',
                ]);
            }
    }

    public function phieu_dat_chi_tiet (Request $request, $id){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::with(['hoa_don', 'goi_du_lich'])
                            ->orderByRaw('id DESC')
                            ->find($id);
        $ds_nguoi_tham_gia = danh_sach_phieu_dat::where('phieu_dat_id','=',$id)->get();
        $data= [
            'pageTitle' => "Phiếu đặt",
            'phieu_dat' => $phieu_dat,
            'ds_nguoi_tham_gia'=>$ds_nguoi_tham_gia,
        ];

        return view('admin.phieu-dat.phieu-dat-chi-tiet', $data);

    }
}
