<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\mon_an;



class MonAnController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lstMonAn = mon_an ::select('id','quan_an_id','ten_mon','gia_ban','hinh_mon_an')->get();
        // foreach($lstDiaDiem as $dia)
        // {
        //     $this->FixImg($dia);
        // }
        return response()->json($lstMonAn);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $input=$request->all();
        $validator=Validator::make($input,[
            'ten_mon'=>'required|string|max:255',
            'gia_ban'=>'required|string|max:255',
        ]);
        if($validator->fails()){
            if(!empty($validator->errors())){
                $response['data']=$validator->errors();
            }
            $response['message']='Vaidator Error';
            return response()->json($response,404);
        }
        $monan=mon_an::create($input);
        $response=[
            'message'=>'Success',
            'data'=>$monan
        ];
        return response()->json($response,200);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $quan_an_id)
    {
       
        $monan = mon_an ::select('id','quan_an_id','ten_mon','gia_ban','hinh_mon_an')->where('quan_an_id','=', $quan_an_id)->get();
        if(is_null($monan))
        return $response['message']='Món ăn không tìm thấy';

        $response=[
            'message'=>'Success',
            'data'=>$monan
        ];
        return response()->json($monan);
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
