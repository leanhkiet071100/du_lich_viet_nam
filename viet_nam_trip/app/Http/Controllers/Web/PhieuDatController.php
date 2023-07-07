<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\phieu_dat;
use App\Models\hoa_don;
use App\Models\danh_sach_phieu_dat;
use App\Models\goi_du_lich;
use App\Models\goi_du_lich_binh_luan;
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
        $danh_gia = goi_du_lich_binh_luan::where('nguoi_dung_id','=',$iduser)
                                            ->where('goi_du_lich_id','=',$phieu_dat->goi_du_lich->id)
                                            ->first();
        $data= [
            'pageTitle' => "Phiếu đặt",
            'phieu_dat' => $phieu_dat,
            'ds_nguoi_tham_gia'=>$ds_nguoi_tham_gia,
            'danh_gia'=>$danh_gia,
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

    public function danh_gia_phieu_dat_sua($id, $danh_gia_id){
           $iduser = Auth::user()->id;
        $phieu_dat = phieu_dat::with(['hoa_don', 'goi_du_lich'])
                            ->find($id);

        $danh_gia = goi_du_lich_binh_luan::where('nguoi_dung_id','=',$iduser)
                                            ->where('goi_du_lich_id','=',$phieu_dat->goi_du_lich->id)
                                            ->find($danh_gia_id);
        $data= [
            'phieu_dat' => $phieu_dat,
            'danh_gia' => $danh_gia,
        ];

        return view('web.nguoidung.phieu-dat.form_danh_gia_sua', $data);
    }

    public function post_danh_gia_phieu_dat_sua(Request $request, $id, $danh_gia_id){
        $phieu_dat_id = $id;
        $id_user = Auth::user()->id;
        $noi_dung = $request->noi_dung;
        $so_sao = $request->so_sao;
        // $created_at =  Carbon::now('Asia/Bangkok');
        // $hinhbinhluan= $request->file('hinhanh');
        if($so_sao == null || $so_sao == 0 || $noi_dung == null || $noi_dung == ''){
            return response()->json([
                'status' => 400,
                'mess'=>'Vui lòng nhập đầy đủ thông tin',
            ]);
        }else{
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$id_user)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->find($id);

        $goi_du_lich_binh_luan = goi_du_lich_binh_luan::find($danh_gia_id);
        $goi_du_lich_binh_luan->update([
            'goi_du_lich_id'=>$phieu_dat->goi_du_lich->id,
            'nguoi_dung_id'=>$id_user,
            'noi_dung'=>$noi_dung,
            'sao'=>$so_sao,
        ]);
        $sao_goi_du_lich = goi_du_lich_binh_luan::avg('sao');
        $goi_du_lich = goi_du_lich::find($phieu_dat->goi_du_lich->id);
        $goi_du_lich->update([
            'sao'=>$sao_goi_du_lich,
        ]);

        /*
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
        */
        return response()->json([
                'status' => 200,
                'mess'=>'Cảm ơn quý khách rất nhiều !'
            ]);
        }

    }
    //kết thúc đánh giá sản phẩm

    //hủy tour
    public function huy_phieu_dat($id){
        $phieu_dat = phieu_dat::with(['hoa_don', 'goi_du_lich'])
                            ->find($id);
        $data= [
            'phieu_dat' => $phieu_dat,
        ];

        return view('web.nguoidung.phieu-dat.form_huy_tour', $data);
    }

    public function post_huy_phieu_dat(Request $request, $id){
        $phieu_dat_id = $id;
        $id_user = Auth::user()->id;
        $noi_dung = $request->noi_dung;
        if($noi_dung == null || $noi_dung == ''){
            return response()->json([
                'status' => 400,
                'mess'=>'Vui lòng nhập đầy đủ thông tin',
            ]);
        }else{
        $phieu_dat = phieu_dat::where('nguoi_dung_id','=',$id_user)
                                ->with(['hoa_don', 'goi_du_lich'])
                                ->find($id);
        $ngay_huy = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $phieu_dat->update([
            'ngay_huy'=>$ngay_huy,
            'li_do_huy'=>$noi_dung,
            'trang_thai'=> 3,
        ]);
        return response()->json([
                'status' => 200,
                'mess'=>'Cảm ơn quý khách rất nhiều !'
            ]);
        }
    }
}
