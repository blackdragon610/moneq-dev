<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User  extends ModelClass implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;


    public $uploadType = "users";


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saveEntry(array $datas, ?object $userToken=null)
    {
        $User = clone $this;

        if (isset($userToken->email)){
            $User->email = $userToken->email;
            $User->nickname = substr($userToken->email, 0, 3);
        }

        $User->password = $datas["password"];
        $User->changePassword();
        $User->save();

        return $User;
    }


    /**
     *  対象の配列のjson化
     */
    public function changeJsonAll()
    {
        $this->changeTrouble();
        $this->changeFamily();
    }

    /**
     *  悩みのjson化
     */
    public function changeTrouble()
    {
        $this->trouble = json_encode($this->trouble);
    }
    /**
     *  家族構成のjson化
     */
    public function changeFamily()
    {
        $this->family = json_encode($this->family);
    }


    /**
     *  ログイン処理
     */
    public function login()
    {
        \Auth::login($this, true);
    }

    /**
     * 投稿できるかの確認
     * @return bool
     */
    public function isPost() :bool
    {
        if ($this->pay_status == 1){
            return false;
        }

        $Post = app("Post");
        $count = $Post->getCountUser($this, date("Y-m"));



        if ($this->pay_status == 2) {

            if ($count >= 4){
                return false;
            }
        }

        if ($this->pay_status == 3) {
            if ($count >= 1){
                return false;
            }
        }


        return true;
    }

    // 追加
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // 追加
    public function getJWTCustomClaims()
    {
        return [];
    }

}
