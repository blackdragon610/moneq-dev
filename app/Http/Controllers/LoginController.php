<?php

namespace App\Http\Controllers;

use App\Libs\ApiClass;
use App\Libs\PushClass;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
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

<<<<<<< HEAD
    public function register()
    {
        return view('logins.register', );
    }

=======
>>>>>>> b72242df3254aa2f03e3b9f4a05cdacd67815073
    public function logout(ApiClass $ApiClass, PushClass $PushClass, Request $request)
    {
        $PushClass->deleteToken($request->input("deviceToken"));
        auth()->logout();


        return $ApiClass->responseOk([]);

    }

}
