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


class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ls_tin_tuc =bai_viet::where('loai_bai_viet','=','tin-tuc')->paginate(8);
        $data= [
            'pageTitle' => "Tin tức",
            'ls_tin_tuc' => $ls_tin_tuc,
        ];
        return view('web.tin-tucs.tin-tuc-ds', $data);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $tin_tuc =bai_viet::where('loai_bai_viet','=','tin-tuc')->find($id);
        $ls_binh_luan = bai_viet_binh_luan::where('bai_viet_id','=',$id)->get();
        $data= [
            'pageTitle' => "Tin tức",
            'tin_tuc' => $tin_tuc,
            'ls_binh_luan'=>$ls_binh_luan,
        ];
        return view('web.tin-tucs.tin-tuc-chi-tiet', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bai_viet $bai_viet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bai_viet $bai_viet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bai_viet $bai_viet)
    {
        //
    }
}
