<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeToken extends ModelClass
{

    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function checkToken(Request $request, $flag) : ?ChangeToken
    {
        $token = $request->input("token");

        if (!$token){
            $token = \Session::get("token");
        }

        $ChangeToken = clone $this;
        $changeToken = $ChangeToken->where([['type', $flag],['token', $token]])->first();

        if ($changeToken){
            \Session::put("token", $token);
            return $changeToken;
        }

        return $changeToken;
    }

    public function savePasswordToken($data){

        $user = \Auth::user();
        $Model = new ChangeToken();

        $Model->user_id = $user->id;
        // $Model->expert_id = 0; //retry
        $Model->value = bcrypt($data["password"]);

        $Model->token = $this->getToken();
        $Model->type = 2;
        $Model->save();

        return $Model;
    }

    public function saveEmailToken($data){

        $user = \Auth::user();
        $Model = new ChangeToken();

        $Model->user_id = $user->id;
        // $Model->expert_id = 0; //retry
        $Model->value = $data["email"];

        $Model->token = $this->getToken();
        $Model->type = 1;
        $Model->save();

        return $Model;
    }
}
