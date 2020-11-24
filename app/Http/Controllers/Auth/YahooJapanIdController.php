<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\UserToken;
use App\Models\User;
use App\Libs\Common;
use Cookie;

use Laravel\Socialite\Contracts\Factory as Socialite;

class YahooJapanIdController extends Controller
{
    protected $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    public function yahoojpLogin()
    {
        //yahooへリダイレクト
        return $this->socialite->driver('yahoojp')->redirect();
    }

    public function yahoojpCallback()
    {
        //ユーザー情報を取得
        $user = $this->socialite->driver('yahoojp')->user();

        //各情報の取得
        $user->getId();
        $user->getName();
        $user->getEmail();


        //  ログイン処理
        $datas = array();
        $datas["email"] = $user->getEmail();
        $datas["token_sns"] = $user->getToken;


        $userCheckModel = User::getUserCheckBySnsToken($user->getEmail());
        if ($userCheckModel) {

            \Auth::login($userCheckModel, true);
            $auto_login = 0;
            if (isset($_COOKIE['auto_login']))
                $auto_login = $_COOKIE['auto_login'];

            $user_id = $userCheckModel->id;
            $email = $userCheckModel->email;
            $custom_token = Common::tokenSet($auto_login, $user_id, $email);

            if ($auto_login == 0) Cookie::queue('token', $custom_token, 120);

            if ($auto_login == 1) Cookie::queue('token', $custom_token, 7200);

            return redirect('/');
        }

        $userToken = new UserToken();
        $userModel = $userToken->saveSNSEntry($datas);
        $token = $userModel->token;
        return redirect()->route('entry.password', compact('token'));
    }
}
