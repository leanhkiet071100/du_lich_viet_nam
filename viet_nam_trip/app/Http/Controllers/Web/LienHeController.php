<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\web;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Extension\check;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LienHeController extends Controller
{
    public function index()
    {
        $web = web::orderBy('id')->first();
        $data= [
            'pageTitle' => "Liên hệ",
            'web' => $web,
        ];

        return view('web.lien-he.lien-he', $data);
    }
}
