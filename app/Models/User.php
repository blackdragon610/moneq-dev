<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Firebase\JWT\JWT;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Models\ChangeToken;

class User  extends ModelClass implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;


    public $uploadType = "users";

    protected $fillable = [
        'nickname', 'email', 'password', 'token_sns'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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

        if (isset($userToken->token_sns)){
            $User->token_sns = $userToken->token_sns;
        }

        if (isset($userToken->tel)){
            $User->tel = $userToken->tel;
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
    public function login($user)
    {
        $changeToken = new ChangeToken();
        $changeToken->user_id = $user->id;
        $changeToken->token = substr(bcrypt($this->setToken($user->email, 0)), 0, 30);
        $changeToken->save();

        \Auth::login($this, true);
    }

    /**
     * トークンの取得
     * @return false|string
     */
    public function setToken($email, $state)
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

        return substr($jwt, 0, $length);
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

    static public function getUserCheckBySnsToken($email){

        $sql ="select *from users where token_sns <> '' and email='".$email."'";
        $user = DB::select($sql);

        return $user;
    }

}
