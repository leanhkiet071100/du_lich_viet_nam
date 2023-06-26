<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\bai_viet;
use App\Models\bai_viet_binh_luan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Validator;

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
        $bai_viet =bai_viet::where('loai_bai_viet','=','bai-viet')
                            ->join('nguoi_dungs','nguoi_dungs.id','=','bai_viets.nguoi_dung_id')
                            ->where('loai_bai_viet','=','bai-viet')
                            ->select('nguoi_dungs.ten', 'nguoi_dungs.hinh_dai_dien','bai_viets.*')
                            ->find($id);

        $ls_binh_luan = bai_viet_binh_luan::where('bai_viet_id','=',$id)
                                            ->with(['binh_luan' => function ($qu) {
                                                    $qu->join('nguoi_dungs','nguoi_dungs.id','=','bai_viet_binh_luans.nguoi_dung_id')
                                                    ->select('nguoi_dungs.ten','nguoi_dungs.hinh_dai_dien','bai_viet_binh_luans.*');
                                                },])
                                            ->get();

        $data= [
            'pageTitle' => "Tin tức",
            'bai_viet' => $bai_viet,
            'ls_binh_luan' => $ls_binh_luan,
        ];
        return view('web.bai-viet.bai-viet-chi-tiet', $data);
    }

    //bình luận bài viết
    public function binh_luan_bai_viet($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noidung' => 'required',
        ], $messages = [
            'noidung' => 'nội dung không được bỏ trống',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            if(!Auth::check()){
                return response()->json([
                'status'=>401,
                'errors'=>"vui lòng đăng nhập",
                ]);
            }
            else{

                $noidung  = $request->noidung;
                $id_binh_luan = $request->id_binh_luan ?? null;
                $binh_luan_bai_viet = bai_viet_binh_luan::create([
                    'bai_viet_id'=>$id,
                    'nguoi_dung_id' => Auth::user()->id,
                    'noi_dung'=> $noidung,
                    'binh_luan_id'=>$id_binh_luan,
                    'hien'=>1,
                    'trang_thai'=>1,
                ]);
                return response()->json([
                    'status'=>200,
                    'mess'=>'Thêm bình luận thành công',
                ]);
            }
        }
    }

      //bình luận bài viết 2
    public function load_binh_luan( Request $request){
        $id_bai_viet = $request->idbaiviet;
        $trang = $request->page;
        $lsbinhluancha =  bai_viet_binh_luan::join('nguoi_dungs','nguoi_dungs.id','=','bai_viet_binh_luans.nguoi_dung_id')
                            ->select('nguoi_dungs.ten','nguoi_dungs.hinh_dai_dien','bai_viet_binh_luans.*')
                            ->where('bai_viet_binh_luans.bai_viet_id','=',$id_bai_viet)
                            ->where('bai_viet_binh_luans.binh_luan_id','=', null)
                            ->where('bai_viet_binh_luans.hien','=',1)
                            ->orderBy('id','DESC')
                            ->with(['binh_luan' => function ($qu) {
                                                    $qu->join('nguoi_dungs','nguoi_dungs.id','=','bai_viet_binh_luans.nguoi_dung_id')
                                                    ->select('nguoi_dungs.ten','nguoi_dungs.hinh_dai_dien','bai_viet_binh_luans.*');
                                                },])
                            ->paginate($perPage = 10, $columns = ['*'], $pageName = 'lsbinhluancha',$page=$trang);

        $lastPage = $lsbinhluancha->lastPage();
        $lsbinhluancon = bai_viet_binh_luan::join('nguoi_dungs','nguoi_dungs.id','=','bai_viet_binh_luans.nguoi_dung_id')
                            ->select('nguoi_dungs.ten','nguoi_dungs.hinh_dai_dien','bai_viet_binh_luans.*')
                            ->where('bai_viet_binh_luans.bai_viet_id','=',$id_bai_viet)
                            ->where('bai_viet_binh_luans.binh_luan_id','!=', null)->get();
        $so_binh_luan = bai_viet_binh_luan::where('bai_viet_binh_luans.bai_viet_id','=',$id_bai_viet)->count();

        $data = [
            'lsbinhluancha'=>$lsbinhluancha,
            'lsbinhluancon'=>$lsbinhluancon,
            'id_bai_viet'=>$id_bai_viet,
            'lastPage' => $lastPage,
            'trang'=>$trang,
            'so_binh_luan'=>$so_binh_luan,
        ];
        return  view('web.bai-viet.binh-luan-bai-viet', $data);


    }
}
