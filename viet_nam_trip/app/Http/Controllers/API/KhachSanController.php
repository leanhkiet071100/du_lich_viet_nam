<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\noi_luu_tru;
use App\Models\dia_diem;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KhachSanController extends Controller
{
    public function FixImg(noi_luu_tru $luutru)
    {
        if(Storage::disk('public')->exists($luutru->hinh_noi_luu_tru)){
            $luutru->hinh_noi_luu_tru = Storage::url($luutru->hinh_noi_luu_tru);
        }else{
            $luutru->image = 'image/no_image_placeholder.png';
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lstDiaDiem = noi_luu_tru ::select('id','dia_diem_id','ten_noi_luu_tru','tinh','huyen','xa','dia_chi','so_dien_thoai','hinh_noi_luu_tru','mo_ta')->get();
        // foreach($lstDiaDiem as $dia)
        // {
        //     $this->FixImg($dia);
        // }
        return response()->json($lstDiaDiem);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $validator=Validator::make($input,[
            'ten_noi_luu_tru'=>'required|string|max:255',
            'dia_chi'=>'required|string',
            'so_dien_thoai'=>'required|string',

        ]);
        if($validator->fails()){
            if(!empty($validator->errors())){
                $response['data']=$validator->errors();
            }
            $response['message']='Vaidator Error';
            return response()->json($response,404);
        }
        $luutru=noi_luu_tru::create($input);
        $response=[
            'message'=>'Success',
            'data'=>$luutru
        ];
        return response()->json($response,200);  
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
