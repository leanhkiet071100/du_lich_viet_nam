<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'pageTitle' => trans('auth.login'),
        ];
    

        return view('admin.login.login', $data);
    }
}
