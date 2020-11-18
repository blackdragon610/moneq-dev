<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

use App\Models\AutoToken;
use App\Models\ChangeToken;

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

            $user_id = $this->guard()->id();
            $email = $this->guard()->user()->email;

            if($request->auto_token == "on"){

                $tokenArray = AutoToken::where([['user_id', $user_id]])->first();
                if(empty($tokenArray)){
                    $autoToken = new AutoToken();
                }else{
                    $autoToken = AutoToken::find($tokenArray->id);
                }
                $autoToken->user_id = $user_id;
                $autoToken->token = $this->getToken($email, 1);
                $autoToken->save();
            }else{
                $cTokenArray = ChangeToken::where([['user_id', $user_id]])->first();
                if(empty($cTokenArray)){
                    $changeToken = new ChangeToken();
                }else{
                    $changeToken = ChangeToken::find($cTokenArray->id);
                }
                $changeToken->user_id = $user_id;
                $changeToken->token = $this->getToken($email, 0);
                $changeToken->save();
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * トークンの取得
     * @return false|string
     */
    protected function getToken($email, $state)
    {
        //----------------------------------------Firebase JWT Token---------------------------------------
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        // $expire_claim = $issuedat_claim + 3600 * 24 * 30; // expire time in seconds
        $expire_claim = $issuedat_claim + 600; // expire time in seconds
        $token = array(
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "email" => $email,
            )
        );

        $jwt = JWT::encode($token, env("JWT_SECRET"), "HS256");

        $length = 30;
        if($state == 1) {
            $length = 100;
        }

        return substr($jwt, 0, $length);

        // JWT::$leeway = 60;
        // try {
        //     $decoded = (array) JWT::decode($jwt, env("JWT_SECRET"), array('HS256'));
        //     // print_r($decoded['data']->email);
        // } catch (ExpiredException $e) {
        //     return false;
        // }
        // $expire_claim = $decoded['exp'];

        //-----------------------------------------------------------------------------------------------
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

