<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dia_diem;
use App\Models\dia_diem_hinh;
use App\Models\bai_viet;
use App\Models\loai_dia_diem;
use App\Models\User;
use App\Models\tinh_huyen_xa;
use App\Models\danh_gia_dia_diem;
use App\Models\danh_gia_dia_diem_hinh;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiaDiemController extends Controller
{
    public function index(Request $request){
        $query = dia_diem::query();
        $totalbaiviets = $query->count();
        $query= $this->handleFilters($query, $request);
        $lsdiadiem = $query->paginate(9);
        //truy vấn theo with
        $tinh = tinh_huyen_xa::where('parent_id', '=', null)->where('loai', '=', 1)->orderBy('ten')->get();
        $huyen = tinh_huyen_xa::where('loai', '=', 2)->orderBy('ten')->get();
        $xa = tinh_huyen_xa::where('loai', '=', 3)->orderBy('ten')->get();
        $data= [
            'pageTitle' => "Địa điểm",
            'lsdiadiem' => $lsdiadiem,
            'tinh'=>$tinh,
            'huyen'=>$huyen,
            'xa'=>$xa,
        ];
        return view('web.dia-diems.dia-diem-ds', $data);
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
        $ls_dia_diem_hinh = dia_diem_hinh::with('dia_diem')->where('dia_diem_id','=', $id)->get();
        $dia_diem = dia_diem::find($id);
        $ls_dia_diem_noi_bat = dia_diem::where('noi_bat', '=', 1)->inRandomOrder()->limit(3)->get();
        $ls_dia_diem_danh_gia = danh_gia_dia_diem::where('dia_diem_id', '=', $id)
                                ->join('nguoi_dungs','nguoi_dungs.id','=','danh_gia_dia_diems.nguoi_dung_id')
                                ->select('danh_gia_dia_diems.*', 'nguoi_dungs.ten', 'nguoi_dungs.hinh_dai_dien')
                                ->with(['danh_gia_dia_diem_hinh'])
                                ->get();

        $data= [
            'pageTitle' => $dia_diem->ten_dia_diem,
            'ls_dia_diem_hinh' => $ls_dia_diem_hinh,
            'dia_diem'=>$dia_diem,
            'ls_dia_diem_noi_bat' => $ls_dia_diem_noi_bat,
            'ls_dia_diem_danh_gia'=> $ls_dia_diem_danh_gia,
        ];
        return view('web.dia-diems.dia-diem-chi-tiet', $data);
    }

    public function danh_gia($id){
        $dia_diem = dia_diem::find($id);
        $data= [
            'dia_diem' => $dia_diem,
        ];
        return view('web.dia-diems.dia-diem-form-danh-gia', $data);
    }

    public function post_danh_gia(Request $request, $id){
        $dia_diem_id = $id;
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
        $danh_gia_dia_diem = new danh_gia_dia_diem;
        $danh_gia_dia_diem->fill([
            'dia_diem_id'=>$dia_diem_id,
            'nguoi_dung_id'=>$id_user,
            'binh_luan_id'=>null,
            'noi_dung'=>$noi_dung,
            'sao'=>$so_sao,
            'trang_thai'=>1,
        ]);
        $danh_gia_dia_diem->save();
        $danh_gia_id = $danh_gia_dia_diem->id;

        if($hinhbinhluan != null){
            foreach($hinhbinhluan as $value){
                $file_name = Str::random(10).'.'.$value->getClientOriginalExtension();
                $imagePath = $value->move(public_path('hinh_danh_gia_dia_diem/'.$danh_gia_id.'/'), $file_name);
                $ten_file = 'hinh_danh_gia_dia_diem/'.$danh_gia_id.'/'.$file_name;
                danh_gia_dia_diem_hinh::create([
                    'danh_gia_dia_diem_id' => $danh_gia_id,
                    'ten'=> $ten_file,
                    'trang_thai'=> 1,
                ]);
            }
        }
        return response()->json([
                'status' => 200,
                'mess'=>'Cảm ơn quý khách rất nhiều !'
            ]);
        }
    }

    public function bai_viet($id){
        $dia_diem = dia_diem::find($id);
        $data= [
            'dia_diem' => $dia_diem,
        ];
        return view('web.dia-diems.dia-diem-form-bai-viet', $data);
    }

    public function post_bai_viet(Request $request, $id){
        $dia_diem_id = $id;
        $id_user = Auth::user()->id;
        $noi_dung = $request->noi_dung;
        $title = $request->tieu_de;
        // $created_at =  Carbon::now('Asia/Bangkok');
        if($title == "" || $title == null || $noi_dung == "" || $noi_dung == null ){
            return response()->json([
                'status' => 400,
                'mess'=>'Bạn chưa nhập tiêu đề hoặc nội dung',
            ]);
        }else{
        $bai_viet_dia_diem = new bai_viet;
         $bai_viet_dia_diem->fill([
            'dia_diem_id'=>$dia_diem_id,
            'tieu_de'=>$title,
            'nguoi_dung_id'=>$id_user,
            'trang_thai'=>1,
            'noi_dung'=>$noi_dung,
            'loai_bai_viet'=>'bai-viet',
        ]);
        $bai_viet_dia_diem->save();

        return response()->json([
                'status' => 200,
                'mess'=>'Cảm ơn quý khách rất nhiều !'
            ]);
        }
    }
}
