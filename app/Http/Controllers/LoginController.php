<?php

namespace App\Http\Controllers;

use App\Libs\ApiClass;
use App\Libs\PushClass;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class LoginController extends Controller
{

    /**
     * 業者ログイン
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('logins.index',);
    }

    public function logout(ApiClass $ApiClass, PushClass $PushClass, Request $request)
    {
        $PushClass->deleteToken($request->input("deviceToken"));
        auth()->logout();


        return $ApiClass->responseOk([]);

    }

}
