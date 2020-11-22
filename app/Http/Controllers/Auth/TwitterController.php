<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Socialite;
use App\Models\UserToken;
use App\Models\User;
use App\Libs\Common;
use Cookie;


class TwitterController extends Controller
{
    public function getAuth()
    {

        return Socialite::driver('twitter')->redirect();
    }

    public function authCallback()
    {
        try {
            $user = $this->getProviderUserInfo();

            if ($user) {
                dd($user); //デバック用
                // OAuth Two Providers
                $token = $user->token;
                $refreshToken = $user->refreshToken; // not always provided
                $expiresIn = $user->expiresIn;

                // All Providers
                $user->getId();
                $user->getNickname();
                $user->getName();
                $user->getEmail();
                $user->getAvatar();

                $datas = array();
                $datas["email"] = $user->getEmail();
                $datas["token_sns"] = $user->token;


                $userCheckModel = User::getUserCheckBySnsToken($user->getEmail());
                if ($userCheckModel) {

                    \Auth::login($userCheckModel, true);
                    $auto_login = 0;
                    if(isset($_COOKIE['auto_login']))
                        $auto_login = $_COOKIE['auto_login'];

                    $user_id = $userCheckModel->id;
                    $email = $userCheckModel->email;
                    $custom_token = Common::tokenSet($auto_login, $user_id, $email);

                    if($auto_login == 0) Cookie::queue('custom_token', $custom_token, 120);

                    if($auto_login == 1) Cookie::queue('custom_token', $custom_token, 7200);

                    return redirect('/');
                }


                $userToken = new UserToken();
                $userModel = $userToken->saveSNSEntry($datas);
                $token = $userModel->token;
                return redirect()->route('entry.password', compact('token'));
            }
        } catch (Exception $e) {
            return redirect("/");
        }
    }

    private function getProviderUserInfo()
    {
        return Socialite::driver('twitter')->user();
    }
}
