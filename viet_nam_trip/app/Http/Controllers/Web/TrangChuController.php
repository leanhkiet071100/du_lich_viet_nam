<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use App\Models\dia_diem;
use App\Models\quan_an;

class TrangChuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ls_dia_diem_noi_bat = dia_diem::where('noi_bat','=',1)->get();
        $ls_quan_an_noi_bat = quan_an::where('noi_bat','=',1)->get();
        $data= [
            'pageTitle' => "Trang chủ",
            'ls_dia_diem_noi_bat' => $ls_dia_diem_noi_bat,
            'ls_quan_an_noi_bat' => $ls_quan_an_noi_bat,
        ];
        return view('web.trang-chu.trang-chu', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
