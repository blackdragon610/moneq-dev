<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Libs\Common;
use Cookie;

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

    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $auto_login = 0;
            if(isset($_COOKIE['auto_login']))
                $auto_login = $_COOKIE['auto_login'];

            $user_id = $this->guard()->id();
            $email = $this->guard()->user()->email;

            $custom_token = Common::tokenSet($auto_login, $user_id, $email);

            if($auto_login == 0) Cookie::queue('token', $custom_token, 120);

            if($auto_login == 1) Cookie::queue('token', $custom_token, 7200);

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
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

