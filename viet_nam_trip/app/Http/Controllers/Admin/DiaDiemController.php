<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dia_diem;
use App\Models\loai_dia_diem;
use App\Models\User;
use Illuminate\Http\Request;

class DiaDiemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = dia_diem::query();
        $totalbaiviets = $query->count();
        $user = User::all();
        //$query= $this->handleFilters($query, $request);
        $lsdiadiem = $query->join('loai_dia_diems','loai_dia_diems.id','=','dia_diems.loai_dia_diem_id')->paginate(15);
        //truy vấn theo with
        $data= [
            'pageTitle' => "Địa điểm",
            'lsdiadiem' => $lsdiadiem,
            'user'=> $user,
        ];
        return view('admin.diadiem.diadiem-ds',$data);
    }

    //tìm kiếm
    private function handleFilters($query, $request){
        $form = $request->get('form', null);
        $to = $request->get('to', null);
        $title = $request->get('title', null);
        //$author_id = $request->get('author_id', null);
        $hien = $request->get('hien', null);
        $noi_bat = $request->get('noi-bat', null);
        $query = fromAndToDateFilter($form, $to, $query, 'created_at');

        if (!empty($title)) {
            $query->where('tieu_de', 'like', '%' . $title . '%');
        }

        // if (!empty($author_id) and count($author_id)) {
        //     $query->whereIn('nguoi_dung_id', $author_id);
        // }

        if (!empty($hien)) {
            $query->where('hien', '=', '1');
        }
        if (!empty($noi_bat)) {
            $query->where('noi_bat', '=', 1);
        }
        return $query;
    }

    public function create()
    {
        $ls_loai_dia_diem = loai_dia_diem::all();
        $data= [
            'pageTitle' => trans('public.create_location'),
            'ls_loai_dia_diem' => $ls_loai_dia_diem,
        ];
        return view('admin.diadiem.diadiem-them', $data);
    }

    public function store(Request $request)
    {

    }

    public function show(diadiem $diadiem)
    {

    }

    public function edit(diadiem $diadiem)
    {
        //
    }

    public function update(Request $request, diadiem $diadiem)
    {
        //
    }

    public function destroy(diadiem $diadiem)
    {
        //
    }

    public function hien(Request $request,$id){
        $check = $request->check;
        $sanpham = dia_diem::find($id);
        if($check=="true"){
            $sanpham->fill([
                'hien'=>1
            ]);
        }else{
            $sanpham->fill([
                'hien'=>0
            ]);
        }
        $sanpham->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }

    public function noi_nat(Request $request,$id){
        $check = $request->check;
        $sanpham = dia_diem::find($id);
        if($check=="true"){
            $sanpham->fill([
                'noi_bat'=>1
            ]);
        }else{
            $sanpham->fill([
                'noi_bat'=>0
            ]);
        }
        $sanpham->save();
        return response()->json([
            'status'=>200,
            'mess'=>  'sửa thành công',
        ]);
    }
}
