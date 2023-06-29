<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $data= [
            'pageTitle' => "Tour",
        ];
        return view('web.tour.tour-ds', $data);
    }
}
