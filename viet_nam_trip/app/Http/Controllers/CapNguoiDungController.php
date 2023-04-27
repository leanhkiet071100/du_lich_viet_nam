<?php

namespace App\Http\Controllers;

use App\Models\cap_nguoi_dung;
use App\Http\Requests\Storecap_nguoi_dungRequest;
use App\Http\Requests\Updatecap_nguoi_dungRequest;

class CapNguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store(Storecap_nguoi_dungRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cap_nguoi_dung $cap_nguoi_dung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cap_nguoi_dung $cap_nguoi_dung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecap_nguoi_dungRequest $request, cap_nguoi_dung $cap_nguoi_dung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cap_nguoi_dung $cap_nguoi_dung)
    {
        //
    }
}
