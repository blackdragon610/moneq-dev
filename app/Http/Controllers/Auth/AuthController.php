<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {
use AuthenticatesUsers;


    /**
     * ログイン認証
     *
     * @var string
     */
    protected string $redirectTo = '/';
    protected string $redirectAfterLogout = '/login';


	public function index(Request $request)
    {

    }


    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        if (getIsExpert()){
            return \Auth::guard('expert');
        }else{
            return \Auth::guard('user');
        }
    }




}

