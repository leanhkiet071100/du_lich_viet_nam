<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\phieu_dat;
use App\Models\hoa_don;
use App\Models\danh_sach_phieu_dat;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PhieuDatController extends Controller
{
        // quản lí đơn hàng
    public function phieu_dat(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Phiếu đặt",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-all', $data);
    }
    public function phieu_dat_cho_duyet(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->where('trang_thai', 1)
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Tour chờ duyệt",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-cho-duyet', $data);
    }

    public function phieu_dat_da_duyet(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->where('trang_thai', 2)
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Tour đã duyệt",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-da-duyet', $data);
    }

    public function phieu_dat_duyet_huy(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->where('trang_thai', 3)
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Tour duyệt hủy",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-duyet-huy', $data);
    }

    public function phieu_dat_hoan_thanh(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->where('trang_thai', 5)
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Tour hoàn thành",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-hoan-thanh', $data);
    }

    public function phieu_dat_huy(Request $request){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->where('trang_thai', 4)
                            ->orderByRaw('id DESC')
                            ->get();
        $data= [
            'pageTitle' => "Tour hủy",
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-huy', $data);
    }

    public function phieu_dat_chi_tiet (Request $request, $id){
        $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$iduser)
                            ->with(['hoa_don', 'goi_du_lich'])
                            ->orderByRaw('id DESC')
                            ->find($id);
        $ds_nguoi_tham_gia = danh_sach_phieu_dat::where('phieu_dat_id','=',$id)->get();
        $data= [
            'pageTitle' => "Phiếu đặt",
            'phieu_dat' => $phieu_dat,
            'ds_nguoi_tham_gia'=>$ds_nguoi_tham_gia,
        ];

        return view('web.nguoidung.phieu-dat.phieu-dat-chi-tiet', $data);

    }
    // kết thúc quản lí hóa đơn hàng
    //đánh giá sản phẩm
    public function danh_gia_phieu_dat($id){
        $phieu_dat = phieu_dat::with(['hoa_don', 'goi_du_lich'])
                            ->find($id);
        $data= [
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.form_danh_gia_san_pham', $data);
    }

    public function post_danh_gia_san_pham(Request $request, $id){
        $phieu_dat_id = $id;
        $id_user = Auth::user()->id;
        $noi_dung = $request->noi_dung;
        $so_sao = $request->so_sao;
        // $created_at =  Carbon::now('Asia/Bangkok');
        $trang_thai = 1;
        $hinhbinhluan= $request->file('hinhanh');
        if($so_sao == null || $so_sao == 0 ){
            return response()->json([
                'status' => 400,
                'mess'=>'vui lòng đánh giá sản phẩm',
            ]);
        }else{
        $sanpham_binhluan = new sanpham_binhluan;
        $sanpham_binhluan->fill([
            'ma_san_pham'=>$ma_san_pham,
            'ma_nguoi_dung'=>$id_user,
            'id_binh_luan_cha'=>null,
            'noi_dung'=>$noi_dung,
            'danh_gia'=>$so_sao,
            'hien'=>1,
            'trang_thai'=>1,
        ]);
        $sanpham_binhluan->save();

        $id_sanpham_binhluan = $sanpham_binhluan->id;

        if($hinhbinhluan != null){
            foreach($hinhbinhluan as $value){
                $file_name = Str::random(10).'.'.$value->getClientOriginalExtension();

                $imagePath = $value->move(public_path('hinh_binh_luan_san_pham/'.$id_sanpham_binhluan.'/'), $file_name);
                $ten_file = 'hinh_binh_luan_san_pham/'.$id_sanpham_binhluan.'/'.$file_name;
                sanpham_binhluan_hinhanh::create([
                    'ten_file' => $ten_file,
                    'ma_binh_luan' => $id_sanpham_binhluan,
                    'hien'=> 1,
                    'trang_thai'=> 1,
                ]);
            }
        }
        return response()->json([
                'status' => 200,
                'mess'=>'Cảm ơn quý khách rất nhiều !'
                                    ]);
                                }
        //return view('nguoidung.donhang.form_danh_gia_san_pham')->with(['san_pham'=>$san_pham]);
    }
    //kết thúc đánh giá sản phẩm
}
