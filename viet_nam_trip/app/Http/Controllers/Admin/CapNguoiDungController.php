<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cap_nguoi_dung;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class CapNguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = cap_nguoi_dung::orderBy('created_at','asc')->paginate(10);
        
        $data = [
            'pageTitle' => trans('public.role'),
            'title' => trans('public.role'),
            'roles'=>$roles,
            
        ];
        return view('admin.capnguoidung.capnguoidung-ds',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'pageTitle' => trans('public.create_role'),
            'title' => trans('public.create_role'),
        ];
        return view('admin.capnguoidung.capnguoidung-them', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:64|unique:cap_nguoi_dungs,ten',
            'chuc-danh' => 'required|min:3|max:64|unique:cap_nguoi_dungs,chuc_danh',
        ],
        [
            'required'=> 'Trường không dược để trông',
            'unique' => 'Trường đã tồn tại',
        ],);

        $data = $request->all();
    
        $role = cap_nguoi_dung::create([
            'ten'=>$data['name'],
            'chuc_danh'=>$data['chuc-danh'],
            'is_admin' => (!empty($data['is_admin']) and $data['is_admin'] == 'on'),
            'created_at' => time(),
        ]);
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('public.create_success'),
            'status' => 'success'
        ];
        return redirect('/admin/vai-tro-nguoi-dung')->with(['toast' => $toastData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(cap_nguoi_dung $cap_nguoi_dung)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $role = cap_nguoi_dung::findOrFail($id);
      
        $data = [
            'pageTitle' => trans('public.update_role'),
            'role' => $role,
            'title' => trans('public.update_role')
        ];

        return view('admin.capnguoidung.capnguoidung-sua', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = cap_nguoi_dung::findOrFail($id);
     

        $this->validate($request, [
            'name' => 'required|min:3|max:64',
            'chuc-danh' => 'required|min:3|max:64',
        ],
        [
            'required'=> 'Trường không dược để trông',
            'unique' => 'Trường đã tồn tại',
        ],);
      
        $data = $request->all();
    
        $role->update([
            'ten' => $data['name'],
            'chuc_danh'=>$data['chuc-danh'],
            'is_admin' => ((!empty($data['is_admin']) and $data['is_admin'] == 'on')),
        ]);
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('public.create_success'),
            'status' => 'success'
        ];
        return redirect('/admin/vai-tro-nguoi-dung')->with(['toast' => $toastData]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cap_nguoi_dung $cap_nguoi_dung)
    {
        $role = cap_nguoi_dung::findOrFail($id);

        $role->delete();

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('public.delete_success'),
            'status' => 'success'
        ];

        return redirect('/admin/vai-tro-nguoi-dung')->with(['toast' => $toastData]);
    }
}
