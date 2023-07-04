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
        Route::middleware('App\Http\Middleware\CheckLoginAdmin')->group(function(){
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
        // Route::group(['prefix' => 'loai-dia-diem'], function () {
        //     Route::name('loai-dia-diem.')->group(function(){
        //         Route::get('/', 'LoaiDiaDiemController@index')->name('index');
        //         Route::get('/load', 'LoaiDiaDiemController@load')->name('load');
        //         Route::get('/create', 'LoaiDiaDiemController@create')->name('create');
        //         Route::post('/store', 'LoaiDiaDiemController@store')->name('store');
        //         Route::get('/{id}/edit', 'LoaiDiaDiemController@edit')->name('edit');
        //         Route::post('/{id}/update', 'LoaiDiaDiemController@update')->name('update');
        //         Route::delete('/{id}/destroy', 'LoaiDiaDiemController@destroy')->name('destroy');
        //         Route::post('/hien/{id}', 'LoaiDiaDiemController@hien')->name('hien');

        //     });
        // });

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
                Route::post('/hien/{id}', 'LoaiGoiDulichController@hien')->name('hien');
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
                 Route::post('/noi-bat/{id}', 'GoiDuLichController@noi_nat')->name('noi-bat');
            });
        });

        Route::group(['prefix' => 'lich-trinh'], function () {
            Route::name('lich-trinh.')->group(function(){
                Route::get('/', 'LichTrinhController@index')->name('index');
                Route::get('/create/{id_tour}', 'LichTrinhController@create')->name('create');
                Route::post('/store/{id_tour}', 'LichTrinhController@store')->name('store');
                Route::get('/{id}/edit/{id_tour}', 'LichTrinhController@edit')->name('edit');
                Route::post('/{id}/update/{id_tour}', 'LichTrinhController@update')->name('update');
                Route::delete('/{id}/destroy/{id_tour}', 'LichTrinhController@destroy')->name('destroy');
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
                Route::get('/kich-hoat-lai/{email}', 'AuthController@kich_hoat_lai')->name('kich-hoat-lai');
                //Đăng kí
                Route::get('/dang-ki', 'AuthController@dang_ki')->name('dang-ki');
                Route::post('/dang-ki','AuthController@post_dang_ki')->name('post-dang-ki');
                Route::get('/kich-hoat/{id}/{token}','AuthController@kich_hoat')->name('kich-hoat');
                Route::get('/kich-hoat-api/{id}/{email}','AuthController@kich_hoat_api')->name('kich-hoat-api');

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

                  //bình luận tin tức
                Route::post('/binh-luan-tin-tuc/{id}','TinTucController@binh_luan_bai_viet')->name('binh-luan-tin-tuc');
                Route::post('/load-binh-luan-tin-tuc','TinTucController@load_binh_luan')->name('load-binh-luan-tin-tuc');
            });
        });

        //bài viết
        Route::group(['prefix' => 'bai-viet'], function () {
            Route::name('bai-viet.')->group(function(){
                Route::get('/', 'BaiVietController@index')->name('index');
                Route::get('/{id}/show', 'BaiVietController@show')->name('show');

                //bình luận bài viết
                Route::post('/binh-luan-bai-viet/{id}','BaiVietController@binh_luan_bai_viet')->name('binh-luan-bai-viet');
                Route::post('/load-binh-luan-bai-viet','BaiVietController@load_binh_luan')->name('load-binh-luan-bai-viet');
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

        //Tài khoản
        Route::prefix('tai-khoan')->group(function(){
            Route::name('tai-khoan.')->group(function(){
                // load trang người dung
                Route::get('/', 'TaiKhoanController@index')->name('tai-khoan');
                // thay đổi thông tin tài khoản
                Route::post('/', 'TaiKhoanController@thay_doi_tai_khoan')->name('post-tai-khoan');
                // đổi  mật khẩu
                Route::get('/doi-mat-khau', 'TaiKhoanController@doi_mat_khau')->name('doi-mat-khau');
                Route::post('/doi-mat-khau', 'TaiKhoanController@post_doi_mat_khau')->name('post-doi-mat-khau');
                // load địa chỉ
                Route::get('/dia-chi', 'TaiKhoanController@dia_chi')->name('dia-chi');
                //load form thêm địa chỉ
                Route::get('/get-dia-chi', 'TaiKhoanController@get_dia_chi')->name('get-dia-chi');
                // thêm địa chỉ
                Route::post('/post-dia-chi', 'TaiKhoanController@post_dia_chi')->name('post-dia-chi');
                //load form sửa địa chỉ
                Route::get('/get-dia-chi-sua/{id}', 'TaiKhoanController@get_dia_chi_sua')->name('get-dia-chi-sua');
                //sửa địa chỉ
                Route::post('/post-dia-chi-sua/{id}', 'TaiKhoanController@post_dia_chi_sua')->name('post-dia-chi-sua');
                //thiết lập địa chỉ mặc định
                Route::post('/thiet-lap-dia-chi', 'TaiKhoanController@thiet_lap_dia_chi')->name('thiet-lap-dia-chi');
                //load tỉnh thành Việt Nam
                Route::post('/get-load-huyen', 'TaiKhoanController@get_load_huyen')->name('get-load-huyen');
                Route::post('/get-load-xa', 'TaiKhoanController@get_load_xa')->name('get-load-xa');
                //Đăng xuất
                Route::get('/logout-user', 'AuthController@dang_xuat')->name('logout-user');
                //Đơn hàng
                Route::get('/don-hang', 'TaiKhoanController@don_hang')->name('don-hang');
                Route::get('/don-hang-cho-xac-nhan', 'TaiKhoanController@don_hang_cho_xac_nhan')->name('don-hang-cho-xac-nhan');
                Route::get('/don-hang-van-chuyen', 'TaiKhoanController@don_hang_van_chuyen')->name('don-hang-van-chuyen');
                Route::get('/don-hang-dang-giao', 'TaiKhoanController@don_hang_dang_giao')->name('don-hang-dang-giao');
                Route::get('/don-hang-hoan-thanh', 'TaiKhoanController@don_hang_hoan_thanh')->name('don-hang-hoan-thanh');
                Route::get('/don-hang-huy', 'TaiKhoanController@don_hang_huy')->name('don-hang-huy');
                Route::get('/don-hang-tra-hang', 'TaiKhoanController@don_hang_tra_hang')->name('don-hang-tra-hang');
                Route::get('/don-hang-chi-tiet/{id}', 'TaiKhoanController@don_hang_chi_tiet')->name('don-hang-chi-tiet');
                //Đánh giá sản phẩm
                Route::get('/danh-gia-san-pham/{id}', 'TaiKhoanController@danh_gia_san_pham')->name('danh-gia-san-pham');
                Route::post('/post-danh-gia-san-pham/{id}', 'TaiKhoanController@post_danh_gia_san_pham')->name('post-danh-gia-san-pham');
            });
        });

        //tour
        Route::group(['prefix' => 'tour'], function () {
            Route::name('tour.')->group(function(){
                Route::get('/', 'TourController@index')->name('index');
                Route::get('/{id}/show', 'TourController@show')->name('show');
                Route::get('/booking/{id}', 'TourController@booking')->name('booking')->middleware('check_login');
                Route::get('/load-nguoi-lon/{so_luong}', 'TourController@load_nguoi_lon')->name('load-nguoi-lon');
                Route::get('/load-tre-em/{so_luong}', 'TourController@load_tre_em')->name('load-tre-em');
                Route::get('/load-tre-nho/{so_luong}', 'TourController@load_tre_nho')->name('load-tre-nho');
                Route::post('/tong-hoa-don/{id}', 'TourController@tong_hoa_don')->name('tong-hoa-don');
                Route::get('/thanh-toan/{id}', 'TourController@thanh_toan')->name('thanh-toan')->middleware('check_login');
                Route::post('/post-thanh-toan/{id}/{phieu_dat_id}', 'TourController@post_thanh_toan')->name('post-thanh-toan')->middleware('check_login');
                Route::post('/post-thanh-toan/{phieu_dat_id}', 'ThanhToanController@post_thanh_toan')->name('vnpay-success');
            });

        });
        // thanh toán bằng momo
        Route::group(['prefix' => 'thanh-toan'], function () {
            Route::name('thanh-toan.')->group(function(){
                Route::get('/vnpay-success/{phieu_dat_id}', 'ThanhToanController@vnpay_success')->name('vnpay-success');
            });

        });
    });
});
