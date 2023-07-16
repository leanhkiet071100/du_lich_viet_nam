<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KhachSanController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\GoiDuLichController;
use App\Http\Controllers\API\QuanAnController;
use App\Http\Controllers\API\MonAnController;

use App\Http\Controllers\API\TaiKhoanController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('post-quen-mat-khau',[AuthController::class,'post_quen_mat_khau']);
Route::post('post-doi-mat-khau',[AuthController::class,'post_doi_mat_khau']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('code',[AuthController::class,'quen_mat_khau_xac_nhan']);
    Route::post('change-pass',[AuthController::class,'changePassword']);
    Route::post('update-info',[AuthController::class,'update']);
    Route::post('dat-tour',[TourController::class,'dat_tour']);
    Route::get('get-thanh-toan',[TourController::class,'get_thanh_toan']);
    Route::post('thanh-toan',[TourController::class,'thanh_toan']);


    // tour

    Route::get('/phieu-dat', [TaiKhoanController::class,'phieu_dat']);
    Route::get('/phieu-dat-cho-duyet',[TaiKhoanController::class,'phieu_dat_cho_duyet']);
    Route::get('/phieu-dat-da-duyet',[TaiKhoanController::class,'phieu_dat_da_duyet']);
    Route::get('/phieu-dat-duyet-huy',[TaiKhoanController::class,'phieu_dat_duyet_huy']);
    Route::get('/phieu-dat-hoan-thanh',[TaiKhoanController::class,'phieu_dat_hoan_thanh']);
    Route::get('/phieu-dat-huy',[TaiKhoanController::class,'phieu_dat_huy']);
    Route::get('/phieu-dat-chi-tiet/{id}',[TaiKhoanController::class,'phieu_dat_chi_tiet']);
});

Route::apiResource('luutru',KhachSanController::class);
Route::apiResource('quan-an',QuanAnController::class);
Route::apiResource('list-tour',TourController::class);
Route::apiResource('mon-an',MonAnController::class);
//Route::get('mon-an/show/{quan_an_id}',[MonAnController::class,'show']);