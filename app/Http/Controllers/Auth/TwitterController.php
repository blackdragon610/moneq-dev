<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Socialite;
use App\Models\UserToken;

class TwitterController extends Controller
{
  public function getAuth() {

    // $datas = array();
    // $datas["email"] = "erfe@fdasfa";
    // $datas["token_sns"] = "sdae9ek3dndu8adffajs;dflja09l3";

    // $userToken = new UserToken();
    // $userModel = $userToken->saveSNSEntry($datas);
    // $token = $userModel->token;
    // return redirect()->route('entry.password', compact('token'));


    return Socialite::driver('twitter')->redirect();
  }

  public function authCallback() {
    try{
        $user = $this->getProviderUserInfo();

        if($user){
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
    return Socialite::driver('twitter')->user();
  }
}
