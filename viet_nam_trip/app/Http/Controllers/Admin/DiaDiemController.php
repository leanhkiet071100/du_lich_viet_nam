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
    public function index()
    {
        $query = dia_diem::query();
        $totalbaiviets = $query->count();
        $user = User::all();
        //$query= $this->handleFilters($query, $request);
        $lsdiadiem = $query->paginate(15);


        $data= [
            'pageTitle' => "Địa điểm",
            'lsdiadiem' => $lsdiadiem,
            'user'=> $user,
        ];
        return view('admin.diadiem.diadiem-ds',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(diadiem $diadiem)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(diadiem $diadiem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, diadiem $diadiem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(diadiem $diadiem)
    {
        //
    }
}
