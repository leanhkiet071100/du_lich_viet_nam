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
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'web'], function () {
    Route::name('admin.')->group(function(){
        Route::get('login', 'LoginController@showLoginForm')->name('login');

        // Route::group(['middleware' => 'admin'], function () {});

        Route::group(['prefix' => 'bai-viet'], function () {
            Route::get('/', 'BaiVietController@bai_viet')->name('bai-viet');
        });
    });
});
