<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\quan_an;
use App\Models\mon_an;
use Illuminate\Http\Request;

class QuanAnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quan_ans = quan_an::get();
        $data= [
            'pageTitle' => "Quán ăn",
            'quan_ans'=> $quan_ans,
        ];
        return view('web.quan-an.quan-an-ds', $data);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request, $id)
    {
        $quan_an = quan_an::find($id);
        $mon_ans = mon_an::where('quan_an_id', '=', $id)->get();
          $data= [
                'pageTitle' => "Quán ăn chi tiết",
                'quan_an'=>$quan_an,
                'mon_ans'=>$mon_ans,
            ];
            return view('web.quan-an.quan-an-chi-tiet', $data);
    }

    public function edit(quan_an $quan_an)
    {
        //
    }

    public function update(Request $request, quan_an $quan_an)
    {
        //
    }

    public function destroy(quan_an $quan_an)
    {
        //
    }
}
