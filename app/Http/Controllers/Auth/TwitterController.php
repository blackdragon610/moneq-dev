<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Socialite;

class TwitterController extends Controller
{
  public function getAuth() {
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

        }
    }catch(Exception $e){
        return redirect("/");
    }
  }

  private function getProviderUserInfo(){
    return Socialite::driver('twitter')->user();
  }
}
