<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => '', 'middleware' => 'web'], function () {
    Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('login');

    
});