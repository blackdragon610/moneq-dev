<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//フロント部分
Route::group(["middleware" => "common:user", "type" => "user"], function() {
    Route::group(["middleware" => "jwtCheck"], function () {
        Route::post("login/auth", "LoginController@auth");
    });

});

