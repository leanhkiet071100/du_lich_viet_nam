<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\bai_viet;
use App\Models\bai_viet_binh_luan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BaiVietController extends Controller
{
    public function index()
    {
        $ls_bai_viet =bai_viet::where('loai_bai_viet','=','bai-viet')->paginate(8);
        $data= [
            'pageTitle' => "Tin tức",
            'ls_bai_viet' => $ls_bai_viet,
        ];
        return view('web.bai-viet.bai-vet-ds', $data);
    }

    public function show(Request $request, $id)
    {
        $bai_viet =bai_viet::where('loai_bai_viet','=','bai-viet')->join('nguoi_dungs','nguoi_dungs.id','=','bai_viets.nguoi_dung_id')->find($id);

        $ls_binh_luan = bai_viet_binh_luan::where('bai_viet_id','=',$id)->get();
        $data= [
            'pageTitle' => "Tin tức",
            'bai_viet' => $bai_viet,
            'ls_binh_luan' => $ls_binh_luan,
        ];
        return view('web.bai-viet.bai-viet-chi-tiet', $data);
    }
}
