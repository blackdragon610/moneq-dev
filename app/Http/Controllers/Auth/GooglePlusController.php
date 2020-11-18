<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserToken;
use Socialite;
use App\Models\User;

class GooglePlusController extends Controller
{
    public function getAuth() {
        return Socialite::driver('google')->redirect();
      }

      public function authCallback() {
        try{
            $user = $this->getProviderUserInfo();

            if($user){
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


                $userCheckModel = User::getUserCheckBySnsToken($user->token);
                if(!empty($userCheckModel)){
                    return redirect()->route('auth.get', compact('userCheckModel'));
                }


                $userToken = new UserToken();
                $userModel = $userToken->saveSNSEntry($datas);
                $token = $userModel->token;
                return redirect()->route('entry.password', compact('token'));
            }
        }catch(Exception $e){
            return redirect("/");
        }
      }

      private function getProviderUserInfo(){
        return Socialite::driver('google')->stateless()->user();
      }
}
