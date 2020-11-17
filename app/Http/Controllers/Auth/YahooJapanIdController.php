<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\UserToken;

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

        $userToken = new UserToken();
        $userModel = $userToken->saveSNSEntry($datas);
        $token = $userModel->token;
        return redirect()->route('entry.password', compact('token'));
    }
}
