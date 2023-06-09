<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dia_diem;
use App\Models\dia_diem_hinh;
use App\Models\loai_dia_diem;
use App\Models\User;
use App\Models\tinh_huyen_xa;
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
        $lsdiadiem = $query->paginate(15);
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
        if(!empty($sao_1) || !empty($sao_2) || !empty($sao_3) || !empty($sao_4) || !empty($sao_4)){
        $query->whereIn('sao', $sao);}



        return $query;
    }

    public function show($id){
        $ls_dia_diem_hinh = dia_diem_hinh::with('dia_diem')->where('dia_diem_id','=', $id)->get();
        $dia_diem = dia_diem::find($id);
        $ls_dia_diem_noi_bat = dia_diem::where('noi_bat', '=', 1)->inRandomOrder()->limit(3)->get();
        //truy vấn theo with
        $data= [
            'pageTitle' => $dia_diem->ten_dia_diem,
            'ls_dia_diem_hinh' => $ls_dia_diem_hinh,
            'dia_diem'=>$dia_diem,
            'ls_dia_diem_noi_bat' => $ls_dia_diem_noi_bat,
        ];
        return view('web.dia-diems.dia-diem-chi-tiet', $data);
    }
}
