<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Nhóm admin
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::name('admin.')->group(function(){
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login_admin', 'LoginController@post_login_admin')->name('post_login_admin');
        Route::post('logout_admin', 'LoginController@logout_admin')->name('logout_admin');
        // Route::group(['middleware' => 'admin'], function () {});

        Route::group(['prefix' => 'bai-viet'], function () {
            Route::name('bai-viet.')->group(function(){
                Route::get('/', 'BaiVietController@index')->name('index');
                Route::get('/create', 'BaiVietController@create')->name('create');
                Route::post('/store', 'BaiVietController@store')->name('store');
                Route::get('/{id}/edit', 'BaiVietController@edit')->name('edit');
                Route::post('/{id}/update', 'BaiVietController@update')->name('update');
                Route::get('/{id}/destroy', 'BaiVietController@destroy')->name('destroy');
                Route::post('/hien/{id}', 'BaiVietController@hien')->name('hien');
                Route::post('/noi-bat/{id}', 'BaiVietController@noi_bat')->name('noi-bat');
            });
        });

        Route::group(['prefix' => 'tin-tuc'], function () {
            Route::name('tin-tuc.')->group(function(){
                Route::get('/', 'TinTucController@index')->name('index');
                Route::get('/create', 'TinTucController@create')->name('create');
                Route::post('/store', 'TinTucController@store')->name('store');
                Route::get('/{id}/edit', 'TinTucController@edit')->name('edit');
                Route::post('/{id}/update', 'TinTucController@update')->name('update');
                Route::get('/{id}/destroy', 'TinTucController@destroy')->name('destroy');
                Route::post('/hien/{id}', 'TinTucController@hien')->name('hien');
                Route::post('/noi-bat/{id}', 'TinTucController@noi_bat')->name('noi-bat');
            });
        });

        Route::group(['prefix' => 'nguoi-dung'], function () {
            Route::name('nguoi-dung.')->group(function(){
                Route::get('/', 'UserController@index')->name('index');
                Route::get('/create', 'UserController@create')->name('create');
                Route::post('/store', 'UserController@store')->name('store');
                Route::get('/{id}/show', 'UserController@show')->name('show');
                Route::get('/{id}/edit', 'UserController@edit')->name('edit');
                Route::post('/{id}/update', 'UserController@update')->name('update');
                Route::get('/{id}/destroy', 'UserController@destroy')->name('destroy');
                Route::get('/nguoi-ban-hang', 'UserController@nguoi_ban_hang')->name('nguoi_ban_hang');
                Route::get('/nguoi-noi-luu-tru', 'UserController@nguoi_noi_luu_tru')->name('nguoi_noi_luu_tru');
                Route::get('/nhan-vien-quan-tri', 'UserController@nhan_vien_quan_tri')->name('nhan-vien-quan-tri');
                Route::get('/yeu-cau-xoa-tai-khoan', 'UserController@yeu_cau_xoa_tai_khoan')->name('yeu-cau-xoa-tai-khoan');
            });
        });

        Route::group(['prefix' => 'vai-tro-nguoi-dung'], function () {
            Route::name('vai-tro-nguoi-dung.')->group(function(){
                Route::get('/', 'CapNguoiDungController@index')->name('index');
                Route::get('/create', 'CapNguoiDungController@create')->name('create');
                Route::post('/store', 'CapNguoiDungController@store')->name('store');
                Route::get('/{id}/edit', 'CapNguoiDungController@edit')->name('edit');
                Route::post('/{id}/update', 'CapNguoiDungController@update')->name('update');
                Route::get('/{id}/destroy', 'CapNguoiDungController@destroy')->name('destroy');
            });
        });


        Route::group(['prefix' => 'dia-diem'], function () {
            Route::name('dia-diem.')->group(function(){
                Route::get('/', 'DiaDiemController@index')->name('index');
                Route::get('/create', 'DiaDiemController@create')->name('create');
                Route::post('/store', 'DiaDiemController@store')->name('store');
                Route::get('/{id}/edit', 'DiaDiemController@edit')->name('edit');
                Route::post('/{id}/update', 'DiaDiemController@update')->name('update');
                Route::delete('/{id}/destroy', 'DiaDiemController@destroy')->name('destroy');
                Route::post('/hien/{id}', 'DiaDiemController@hien')->name('hien');
                Route::post('/noi-bat/{id}', 'DiaDiemController@noi_nat')->name('noi-bat');

            });
        });

        Route::group(['prefix' => 'loai-dia-diem'], function () {
            Route::name('loai-dia-diem.')->group(function(){
                Route::get('/', 'LoaiDiaDiemController@index')->name('index');
                Route::get('/load', 'LoaiDiaDiemController@load')->name('load');
                Route::get('/create', 'LoaiDiaDiemController@create')->name('create');
                Route::post('/store', 'LoaiDiaDiemController@store')->name('store');
                Route::get('/{id}/edit', 'LoaiDiaDiemController@edit')->name('edit');
                Route::post('/{id}/update', 'LoaiDiaDiemController@update')->name('update');
                Route::delete('/{id}/destroy', 'LoaiDiaDiemController@destroy')->name('destroy');
                Route::post('/hien/{id}', 'LoaiDiaDiemController@hien')->name('hien');

            });
        });

        // loại gói du lịch
        Route::group(['prefix' => 'loai-goi-du-lich'], function () {
            Route::name('loai-goi-du-lich.')->group(function(){
                Route::get('/', 'LoaiGoiDulichController@index')->name('index');
                Route::get('/load', 'LoaiGoiDulichController@load')->name('load');
                Route::get('/create', 'LoaiGoiDulichController@create')->name('create');
                Route::post('/store', 'LoaiGoiDulichController@store')->name('store');
                Route::get('/{id}/edit', 'LoaiGoiDulichController@edit')->name('edit');
                Route::post('/{id}/update', 'LoaiGoiDulichController@update')->name('update');
                Route::delete('/{id}/destroy', 'LoaiGoiDulichController@destroy')->name('destroy');
            });
        });
        // gói du lịch
        Route::group(['prefix' => 'goi-du-lich'], function () {
            Route::name('goi-du-lich.')->group(function(){
                Route::get('/', 'GoiDuLichController@index')->name('index');
                Route::get('/load', 'GoiDuLichController@load')->name('load');
                Route::get('/create', 'GoiDuLichController@create')->name('create');
                Route::post('/store', 'GoiDuLichController@store')->name('store');
                Route::get('/{id}/edit', 'GoiDuLichController@edit')->name('edit');
                Route::post('/{id}/update', 'GoiDuLichController@update')->name('update');
                Route::delete('/{id}/destroy', 'GoiDuLichController@destroy')->name('destroy');
            });
        });

    });
});
