<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Models\quan_an;


class QuanAnController extends Controller
{
    public function FixImg(quan_an $quanan)
    {
        if(Storage::disk('public')->exists($quanan->hinh_quan_an)){
            $quanan->hinh_quan_an = Storage::url($quanan->hinh_quan_an);
        }else{
            $quanan->image = 'image/no_image_placeholder.png';
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lstQuanAn = quan_an::select('id','dia_diem_id','ten_quan_an','tinh','huyen','xa','dia_chi','so_dien_thoai','hinh_quan_an')->get();
        //$lstQuanAn = quan_an::all();
        // foreach($lstDiaDiem as $dia)
        // {
        //     $this->FixImg($dia);
        // }
        return response()->json($lstQuanAn);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
