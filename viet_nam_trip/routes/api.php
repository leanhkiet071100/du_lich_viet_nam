<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KhachSanController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\GoiDuLichController;
use App\Http\Controllers\API\QuanAnController;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('quen-mat-khau-xac-nhan',[AuthController::class,'quen_mat_khau_xac_nhan']);
    Route::post('post-doi-mat-khau',[AuthController::class,'post_doi_mat_khau']);
    Route::post('dat-tour',[TourController::class,'dat_tour']);
    Route::get('get-thanh-toan',[TourController::class,'get_thanh_toan']);
    Route::post('thanh-toan',[TourController::class,'thanh_toan']);
});

Route::apiResource('luutru',KhachSanController::class);
Route::apiResource('quan-an',QuanAnController::class);
Route::apiResource('list-tour',TourController::class);
