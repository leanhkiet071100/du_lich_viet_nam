<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhachSanController extends Controller
{
    public function index()
    {
        $data= [
            'pageTitle' => "Khách sạn",
        ];
        return view('web.khach-san.khach-san-ds', $data);
    }
}
