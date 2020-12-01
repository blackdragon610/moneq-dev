<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Firebase\JWT\JWT;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Models\ChangeToken;

class User  extends ModelClass implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;


    public $uploadType = "users";

    protected $fillable = ['nickname', 'gender', 'date_birth_year', 'date_birth_month', 'date_birth_day',
    'prefecture', 'job', 'marriage', 'child', 'trouble', 'income', 'family', 'live'];

    public $field = ['nickname', 'gender', 'date_birth_year', 'date_birth_month', 'date_birth_day',
    'prefecture', 'job', 'marriage', 'child', 'trouble', 'income', 'family', 'live'];


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

    public function saveEmail(object $changeToken=null)
    {
        $user = User::where('id', $changeToken->user_id)->first();

        if($user){
            if (isset($changeToken->value)){
                $user->email = $changeToken->value;
                $user->nickname = substr($changeToken->value, 0, 3);
            }

            $user->email = $changeToken->value;
            $user->save();
            }

        return $user;
    }

    public function savePassword(object $changeToken=null)
    {
        $user = User::where('id', $changeToken->user_id)->first();

        if($user){
            if (isset($changeToken->value)){
                $user->email = $changeToken->value;
                $user->nickname = substr($changeToken->value, 0, 3);
            }

            $user->password = $changeToken->value;
            $user->save();
            }

        return $user;
    }

    public function setPayStatus($status){
        $user = User::where('id', \Auth::user()->id)->first();
        $user->pay_status = $status;
        $user->save();
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

    static public function getUserCheckBySnsToken($email){

        $sql ="select *from users where token_sns <> '' and email='".$email."'";
        $user = DB::select($sql);

        $user = User::where([
            ['token_sns', '<>', "''"],['email', '=', $email]
        ])->first();

        return $user;
    }
    static public function getEmailCheck($email){
        $user = User::where('email', $email)->first();

        if(!$user)   return 0;
        if(!$user)   return 1;
    }

    public function getUserCount(){
        $model = $this->selectRaw("count(*) as userCount")->first();

        return number_format($model->userCount);
    }
}
