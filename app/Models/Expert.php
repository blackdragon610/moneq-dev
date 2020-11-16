<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Expert extends ModelClass implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;


    public $uploadType = "experts";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 初期登録時
     * @param  array  $datas
     * @param  object|null  $userToken
     * @return Expert
     */
    public function saveEntry(array $datas, ?object $userToken=null)
    {
        $Expert = clone $this;
        $Expert->email = $userToken->email;

        $Expert->password = $datas["password"];
        $Expert->changePassword();
        $Expert->save();

        return $Expert;
    }

    public function updateEntry(object $expert, array $datas)
    {
        $expert->setModel($datas);
        $expert->date_birth = $datas["date_birth_year"] . "-" . $datas["date_birth_month"] . "-" . $datas["date_birth_day"];
        $expert->date_start = $datas["date_start_year"] . "-" . $datas["date_start_month"];
        $expert->zip = $datas["zip1"] . "-" . $datas["zip2"];

        $ExpertSpecialtie = app("ExpertSpecialtie");
        $ExpertSpecialtie->saveEntry($expert->id, $datas["specialties"]);

        $expert->save();
    }

    /**
     *  ログイン処理
     */
    public function login()
    {
        \Auth::login($this, true);
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
