<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;

class Common
{
    /**
     * 共通処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role){

        $this->checkToken();
        $name = Route::current()->getName();


        View::share("commonSiteTitle", config("app")["siteTitle"]);
        View::share('commonPageName', $name);

        $isExpert = getIsExpert();
        \View::share("isExpert", $isExpert);
        $request->attributes->add(['expert' => $isExpert]);



        return $next($request);
    }

    protected function checkToken()
    {
        //----------------------------------------Firebase JWT Token---------------------------------------
        $issuer_claim = "http://samplex.org";
        $audience_claim = "http://samplex.com";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        // $expire_claim = $issuedat_claim + 3600 * 24 * 30; // expire time in seconds
        $expire_claim = $issuedat_claim + 600; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => '1',
                "email" => 'aaaa@gmail.com',
                "password" => 'passsseesfs'
            )
        );

        $jwt = JWT::encode($token, env("JWT_SECRET"), "HS256");

        JWT::$leeway = 60;
        try {
            $decoded = (array) JWT::decode($jwt, env("JWT_SECRET"), array('HS256'));
            // print_r($decoded['data']->email);
        } catch (ExpiredException $e) {
            return false;
        }
        $expire_claim = $decoded['exp'];

        //-----------------------------------------------------------------------------------------------
        return redirect()->route('login');
    }
}
