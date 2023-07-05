<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhieuDatController extends Controller
{
        // quản lí đơn hàng
    public function don_hang(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)
                            ->orderByRaw('id DESC')
                            ->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-all')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_cho_xac_nhan(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',1)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-cho-xac-nhan')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_dang_giao(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',3)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-dang-giao')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_hoan_thanh(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',4)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-hoan-thanh')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_huy(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',0)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-huy')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_tra_hang(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',5)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-tra-hang')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }
    public function don_hang_van_chuyen(Request $request){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)->where('trang_thai','=',2)
                            ->orderByRaw('id DESC')->get();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->get();
        return view('nguoidung.donhang.don-hang-van-chuyen')->with(['don_hang'=>$don_hang,'don_hang_chi_tiet'=>$don_hang_chi_tiet]);
    }

    public function don_hang_chi_tiet(Request $request, $id){
        $iduser = Auth::user()->id;
        $don_hang = hoadon::where('ma_nguoi_dung','=',$iduser)
                            ->where('id','=',$id)
                            ->first();
        $don_hang_chi_tiet = hoadon_chitiet::join('sanphams','sanphams.id', '=','hoadon_chitiets.ma_san_pham')
                            ->select('hoadon_chitiets.*','sanphams.ten_san_pham','sanphams.gia','sanphams.hinh_anh','sanphams.tien_giam')
                            ->where('ma_hoa_don','=',$id)
                            ->get();
        $tong_tien_sp =   hoadon_chitiet::where('ma_hoa_don','=',$id)->sum('tong_tien');
        $binh_luan_san_pham = sanpham_binhluan::where('ma_nguoi_dung','=',$id)->get();

        return view('nguoidung.donhang.don-hang-chi-tiet')->with(['don_hang'=>$don_hang,'donhang_chitiet'=>$don_hang_chi_tiet,'tong_tien_sp'=>$tong_tien_sp, 'binh_luan_san_pham'=>$binh_luan_san_pham]);

    }
    // kết thúc quản lí hóa đơn hàng
    //đánh giá sản phẩm
    public function danh_gia_san_pham($id){
        $san_pham = sanpham::join('loai_san_phams','loai_san_phams.id', '=','sanphams.ma_loai_san_pham')
                            ->select('sanphams.*','loai_san_phams.ten_loai_san_pham')
                            ->find($id);
        return view('nguoidung.donhang.form_danh_gia_san_pham')->with(['san_pham'=>$san_pham]);
    }

    public function post_danh_gia_san_pham(Request $request, $id){
        $ma_san_pham = $id;
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
