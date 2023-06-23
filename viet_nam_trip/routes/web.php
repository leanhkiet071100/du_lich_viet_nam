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

        //địa điểm
        Route::group(['prefix' => 'dia-diem'], function () {
            Route::name('dia-diem.')->group(function(){
                Route::get('/', 'DiaDiemController@index')->name('index');
                Route::get('/create', 'DiaDiemController@create')->name('create');
                Route::post('/store', 'DiaDiemController@store')->name('store');
                Route::get('/{id}/edit', 'DiaDiemController@edit')->name('edit');
                Route::post('/{id}/update', 'DiaDiemController@update')->name('update');
                Route::get('/{id}/show', 'DiaDiemController@show')->name('show');
                Route::delete('/{id}/destroy', 'DiaDiemController@destroy')->name('destroy');
                Route::post('/noi-bat/{id}', 'DiaDiemController@noi_nat')->name('noi-bat');
                //load tỉnh thành Việt Nam
                Route::post('/get-load-huyen', 'DiaDiemController@get_load_huyen')->name('get-load-huyen');
                Route::post('/get-load-xa', 'DiaDiemController@get_load_xa')->name('get-load-xa');
            });
        });

        Route::group(['prefix' => 'quan-an'], function () {
            Route::name('quan-an.')->group(function(){
                Route::get('/', 'QuanAnController@index')->name('index');
                Route::get('/create', 'QuanAnController@create')->name('create');
                Route::post('/store', 'QuanAnController@store')->name('store');
                Route::get('/{id}/edit', 'QuanAnController@edit')->name('edit');
                Route::post('/{id}/update', 'QuanAnController@update')->name('update');
                Route::get('/{id}/show', 'QuanAnController@show')->name('show');
                Route::delete('/{id}/destroy', 'QuanAnController@destroy')->name('destroy');
                Route::post('/noi-bat/{id}', 'QuanAnController@noi_nat')->name('noi-bat');
                //load tỉnh thành Việt Nam
                Route::post('/get-load-huyen', 'QuanAnController@get_load_huyen')->name('get-load-huyen');
                Route::post('/get-load-xa', 'QuanAnController@get_load_xa')->name('get-load-xa');
            });
        });

        // món ăn
        Route::group(['prefix' => 'mon-an'], function () {
            Route::name('mon-an.')->group(function(){
                Route::get('/', 'MonAnController@index')->name('index');
                Route::get('/load', 'MonAnController@load')->name('load');
                Route::get('/create/{idquan}', 'MonAnController@create')->name('create');
                Route::post('/quan-an/{idquan}/store', 'MonAnController@store')->name('store');
                Route::get('{id}/edit/quan-an/{idquan}', 'MonAnController@edit')->name('edit');
                Route::post('/{id}/update', 'MonAnController@update')->name('update');
                Route::delete('/{id}/destroy', 'MonAnController@destroy')->name('destroy');

            });
        });


        //hình địa điểm
        Route::group(['prefix' => 'dia-diem-hinh'], function () {
            Route::name('dia-diem-hinh.')->group(function(){
                Route::get('/{id}', 'DiaDiemHinhController@index')->name('index');
                Route::post('/store', 'DiaDiemHinhController@store')->name('store');
                Route::post('/{id}/update', 'DiaDiemHinhController@update')->name('update');
                Route::delete('/destroy/{id}', 'DiaDiemHinhController@destroy')->name('destroy');
                Route::get('/load_hinh/{id}', 'DiaDiemHinhController@load_hinh')->name('load_hinh');
            });
        });

        // loại địa điểm
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

        //khách sạn
        Route::group(['prefix' => 'thong-tin-web'], function () {
            Route::name('thong-tin-web.')->group(function(){
                Route::get('/', 'WebController@index')->name('index');
                 Route::get('/create', 'WebController@create')->name('create');
                Route::post('/store', 'WebController@store')->name('store');
                Route::get('/{id}/edit', 'WebController@edit')->name('edit');
                Route::post('/{id}/update', 'WebController@update')->name('update');
                Route::delete('/{id}/destroy', 'WebController@destroy')->name('destroy');
            });
        });

    });
});

//nnhóm web
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
    Route::name('web.')->group(function(){
        //Auth
        Route::group(['prefix' => ''], function () {
            Route::name('auth.')->group(function(){
                //Đăng nhập
                Route::get('/dang-nhap', 'AuthController@dang_nhap')->name('dang-nhap');
                Route::post('/dang-nhap', 'AuthController@post_dang_nhap')->name('post-dang-nhap');
                //Đăng kí
                Route::get('/dang-ki', 'AuthController@dang_ki')->name('dang-ki');
                Route::post('/dang-ki','AuthController@post_dang_ki')->name('post-dang-ki');
                Route::get('/kich-hoat/{id}/{token}','AuthController@kich_hoat')->name('kich-hoat');

                //quên mật khẩu
                Route::get('/quen-mat-khau', 'AuthController@quen_mat_khau')->name('quen-mat-khau');
                Route::post('/quen-mat-khau', 'AuthController@post_quen_mat_khau')->name('post-quen-mat-khau');
                Route::get('/quen-mat-khau-ma/{email}', 'AuthController@quen_mat_khau_ma')->name('quen-mat-khau-ma');
                Route::post('/quen-mat-khau-xac-nhan/{email}', 'AuthController@quen_mat_khau_xac_nhan')->name('quen-mat-khau-xac-nhan');
                Route::get('/quen-mat-khau-gui-lai-ma/{email}', 'AuthController@quen_mat_khau_gui_lai_ma')->name('quen-mat-khau-gui-lai-ma');
                Route::get('/doi-mat-khau/{email}', 'AuthController@doi_mat_khau')->name('doi-mat-khau');
                Route::post('/post-doi-mat-khau/{email}', 'AuthController@post_doi_mat_khau')->name('post-doi-mat-khau');

            });
        });

        //trang chủ
        Route::group(['prefix' => ''], function () {
            Route::name('trang-chu.')->group(function(){
                Route::get('/', 'TrangChuController@index')->name('index');
            });
        });

        //địa điểm
        Route::group(['prefix' => 'dia-diem'], function () {
            Route::name('dia-diem.')->group(function(){
                Route::get('/', 'DiaDiemController@index')->name('index');
                Route::get('/{id}/show', 'DiaDiemController@show')->name('show');
                Route::get('/danh-gia/{id}','DiaDiemController@danh_gia')->name('danh-gia');
                Route::post('/post-danh-gia/{id}','DiaDiemController@post_danh_gia')->name('post-danh-gia');
                Route::get('/bai-viet/{id}','DiaDiemController@bai_viet')->name('bai-viet');
                Route::post('/post-bai-viet/{id}','DiaDiemController@post_bai_viet')->name('post-bai-viet');
            });

        });
        //tin tuc
        Route::group(['prefix' => 'tin-tuc'], function () {
            Route::name('tin-tuc.')->group(function(){
                Route::get('/', 'TinTucController@index')->name('index');
                Route::get('/{id}/show', 'TinTucController@show')->name('show');
            });
        });

        //bài viết
        Route::group(['prefix' => 'bai-viet'], function () {
            Route::name('bai-viet.')->group(function(){
                Route::get('/', 'BaiVietController@index')->name('index');
                Route::get('/{id}/show', 'BaiVietController@show')->name('show');
            });
        });

        //khách sạn
        Route::group(['prefix' => 'khach-san'], function () {
            Route::name('khach-san.')->group(function(){
                Route::get('/', 'KhachSanController@index')->name('index');
                Route::get('/{id}/show', 'KhachSanController@show')->name('show');
            });
        });

        //về chúng tôi
        Route::group(['prefix' => 've-chung-toi'], function () {
            Route::name('ve-chung-toi.')->group(function(){
                Route::get('/', 'VeChungToiController@index')->name('index');
            });
        });

        //liên hệ
        Route::group(['prefix' => 'lien-he'], function () {
            Route::name('lien-he.')->group(function(){
                Route::get('/', 'LienHeController@index')->name('index');
            });
        });


        //khách sạn
        Route::group(['prefix' => 'khach-san'], function () {
            Route::name('khach-san.')->group(function(){
                Route::get('/', 'KhachSanController@index')->name('index');
                Route::get('/{id}/show', 'KhachSanController@show')->name('show');
            });
        });
    });
});
