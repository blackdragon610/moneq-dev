<?php
namespace App\Libs;

use Firebase\JWT\JWT;

use App\Models\AutoToken;
use App\Models\ChangeToken;

class Common{

    static public function tokenSet($auto_login, $user_id, $email){
        if($auto_login == 1){

            $tokenArray = AutoToken::where([['user_id', $user_id]])->first();
            if (empty($tokenArray)) {
                $autoToken = new AutoToken();
            } else {
                $autoToken = AutoToken::find($tokenArray->id);
            }
            $autoToken->user_id = $user_id;
            $autoToken->token = Common::getToken($email, 1);
            $autoToken->save();
            $token = $autoToken;
        }else{
            $cTokenArray = ChangeToken::where([['user_id', $user_id]])->first();
            if(empty($cTokenArray)){
                $changeToken = new ChangeToken();
            }else{
                $changeToken = ChangeToken::find($cTokenArray->id);
            }
            $changeToken->user_id = $user_id;
            $changeToken->token = substr(bcrypt(Common::getToken($email, 0)), 0, 30);
            $changeToken->save();
            $token = $changeToken;
        }
        return $token;
    }

        /**
     * トークンの取得
     * @return false|string
     */
    static public function getToken($email, $state)
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
        if ($state == 1) {
            $length = 100;
        }

        return substr($jwt, 0, $length);
    }


}
