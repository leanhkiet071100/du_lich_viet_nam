<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\cap_nguoi_dung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = User::query();
        $list_cap_nguoi_dung = cap_nguoi_dung::orderBy('created_at', 'desc')->get();
        $query= $this->handleFilters($query, $request);
    
        $list_nguoi_dung = $query->paginate(15);
        $data = [
            'pageTitle' => trans('public.user'),
            'title'=>trans('public.user'),
            'list_nguoi_dung' => $list_nguoi_dung,
            'list_cap_nguoi_dung'=>$list_cap_nguoi_dung,
        ];
        
        return view('admin.nguoidung.nguoidung-ds', $data);
    }

    // hàm tìm kiếm
    private function handleFilters($query, $request){
        $form = $request->get('form', null);
        $to = $request->get('to', null);
        $title = $request->get('title', null);
        $email = $request->get('email', null);
        $role = $request->get('role_id', null);
        $status = $request->get('status', null);
          
      
        
        //$author_id = $request->get('author_id', null);
        $query = fromAndToDateFilter($form, $to, $query, 'created_at');

        if (!empty($title)) {
            $query->where('ten', 'like', '%' . $title . '%');
        }
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
        if (!empty($role)) {
            $query->where('cap_id', '=', $role);
        }
        if (!empty($status)) {
            $query->where('trang_thai', '=', $status);
        }

        // if (!empty($author_id) and count($author_id)) {
        //     $query->whereIn('nguoi_dung_id', $author_id);
        // }

    
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_cap_nguoi_dung = cap_nguoi_dung::orderBy('created_at', 'desc')->get();
        
        $data = [
            'pageTitle' => trans('public.user'),
            'title'=>trans('public.user'),
            'list_cap_nguoi_dung'=>$list_cap_nguoi_dung,
        ];
        return view('admin.nguoidung.nguoidung-them', $data);
    }


    public function store(Request $request)
    {
        $data = $request->all();
    
        $this->validate($request, [
            'name' => 'required|min:3|max:128',
            'role_id' => 'required',
            'mat-khau' => 'required|string|min:6',
           
            'email'=>'required|email|unique:nguoi_dungs,email',
            'so_dien_thoai'=>'required|unique:nguoi_dungs',
            // 'org_id' => $orgValidate
        ],[
            'required'=>':attribute không được để trống',
            'max'=>'số kí tự :attribute nhỏ hơn :max',
            'min'=>'số kí tự :attribute lớn hơn :min',
            'email'=>':attribute không đúng định dạng email',
            'unique'=>':attribute đã tồn tại'
        ],[
            'name'=>'tên',
            'role_id'=>'vai trò người dùng',
            'mat-khau'=>'mật khẩu',
            'status'=>'trạng thái',
            'so_dien_thoai' => 'số điện thoại'
        ]);
       
        $user = User::create([
            'ten' => $data['name'],
            'email'=>$data['email'],
            'mat_khau'=> Hash::make($data['mat-khau']) ,
            'so_dien_thoai'=> $data['so_dien_thoai'],
            'cap_id'=>$data['role_id'],
            'trang_thai'=>$data['status'],
        ]);
    
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => 'thành công',
            'status' => 'success'
        ];
    
        return redirect('/admin/nguoi-dung')->with(['toast' => $toastData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $nguoi_dung = User::join('cap_nguoi_dungs','nguoi_dungs.cap_id','=','cap_nguoi_dungs.id')->select('nguoi_dungs.*','cap_nguoi_dungs.ten as ten_vai_tro')->find($id);

         $data = [
            'pageTitle' => trans('public.user'),
            'title'=>$nguoi_dung->ten,
            'nguoi_dung' => $nguoi_dung,
            
        ];

        return view('admin.nguoidung.nguoidung-chitiet',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $nguoi_dung = User::join('cap_nguoi_dungs','nguoi_dungs.cap_id','=','cap_nguoi_dungs.id')->select('nguoi_dungs.*','cap_nguoi_dungs.ten as ten_vai_tro')->find($id);
         $list_cap_nguoi_dung = cap_nguoi_dung::orderBy('created_at', 'desc')->get();
         $data = [
            'pageTitle' => trans('public.user'),
            'title'=>$nguoi_dung->ten,
            'nguoi_dung' => $nguoi_dung,
            'list_cap_nguoi_dung' => $list_cap_nguoi_dung,
            
        ];

        return view('admin.nguoidung.nguoidung-sua',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->all();

        $this->validate($request, [
            'name' => 'required|min:3|max:128',
            'role_id' => 'required|exists:cap_nguoi_dungs,id',
            'email'=>'required|email',
            'so_dien_thoai'=>'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'org_id' => $orgValidate
        ],[
            'required'=>':attribute không được để trống',
            'max'=>'số kí tự :attribute nhỏ hơn :max',
            'min'=>'số kí tự :attribute lớn hơn :min',
            'email'=>':attribute không đúng định dạng email',
            'unique'=>':attribute đã tồn tại',
            'image'=> 'Đây không phải là hình ảnh',
            'mimes'=>'hình ảnh có dạng là',
        ],[
            'name'=>'tên',
            'role_id'=>'vai trò người dùng',
            'status'=>'trạng thái',
            'so_dien_thoai' => 'số điện thoại'
        ]);
        $user = User::find($id);

        $user->update([
            'ten' => $data['name'],
            'email'=>$data['email'],
            'so_dien_thoai'=> $data['so_dien_thoai'],
            'cap_id'=>$data['role_id'],
        ]);
        $user->save();

        if(!empty( $data['image'])){
            $file_name = $data['image']->getClientOriginalName();
            $imagePath = $data['image']->move(public_path('hinh_dai_dien/'), $file_name);
            $ten_file = 'hinh_dai_dien/'.$file_name;
            $user->hinh_dai_dien = $ten_file;
            $user->save();
        }
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('public.update'),
            'status' => 'success'
        ];
    
        return redirect('/admin/nguoi-dung')->with(['toast' => $toastData]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
    }
}
