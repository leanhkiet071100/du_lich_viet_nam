<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\goi_du_lich;
use App\Models\loai_goi_du_lich;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = goi_du_lich::query();
        $totalbaiviets = $query->count();
        $query= $this->handleFilters($query, $request);
        $query= $query->join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich');
        $ls_goi_du_lich = $query->paginate(9);
        $ls_loai_goi_du_lich = loai_goi_du_lich::get();
        $max_tien = goi_du_lich::max('gia_nguoi_lon');
        $min_tien = goi_du_lich::min('gia_nguoi_lon');
        $data= [
            'pageTitle' => "Tour",
            'ls_goi_du_lich' => $ls_goi_du_lich,
            'ls_loai_goi_du_lich' => $ls_loai_goi_du_lich,
            'max_tien' => $max_tien,
            'min_tien' => $min_tien,
        ];
        return view('web.tour.tour-ds', $data);
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
        $goi_du_lich = goi_du_lich::join('loai_goi_du_liches', 'loai_goi_du_liches.id', '=', 'goi_du_liches.loai_id')
                    ->select('goi_du_liches.*','loai_goi_du_liches.ten as ten_loai_goi_du_lich')
                    ->find($id);
        $data= [
            'pageTitle' => $goi_du_lich->ten,
        ];
        return view('web.tour.tour-chi-tiet', $data);
    }
}
