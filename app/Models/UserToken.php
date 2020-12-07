<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class UserToken extends ModelClass
{

    protected $hidden = [
    ];

    /**
     * トークンの登録
     * @param  string  $mode
     * @param  array  $datas
     * @return UserToken
     */
    public function saveEntry(string $mode, array $datas, int $expert)
    {
        $Model = clone $this;

        if ($mode == "email"){
            $Model->email = $datas["email"];
        }
        if ($mode == "monitor"){
            $Model->email = $datas["email"];
            $Model->tel = $datas["tel"];
        }

        $Model->token = $this->getToken();
        $Model->is_expert = $expert;

        $Model->save();

        return $Model;
    }

    /**
     * SNSトークンの登録
     * @param  string  $mode
     * @param  array  $datas
     * @return UserToken
     */
    public function saveSNSEntry(array $datas)
    {
        $Model = clone $this;

        $Model->email = $datas["email"];
        $Model->token_sns = $datas["token_sns"];
        $Model->token = $this->getToken();
        $Model->is_expert = 0;

        $Model->save();

        return $Model;
    }

    public function checkToken(Request $request) : ?UserToken
    {
        $token = $request->input("token");



        if (!$token){
            $token = \Session::get("token");
        }

        $UserToken = clone $this;
        $userToken = $UserToken->whereToken($token)->first();

        if ($userToken){
            \Session::put("token", $token);
            return $userToken;
        }

        return $userToken;
    }

}
