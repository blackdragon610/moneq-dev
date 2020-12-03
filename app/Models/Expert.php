<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Specialtie;
use App\Models\ExpertLicense;

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

    public function specialtie(){
        return $this->belongsTo(Specialtie::class);
    }

    public function getExpertCount(){
        $model = $this->selectRaw("count(*) as expertCount")->first();

        return number_format($model->expertCount);
    }

    public function monthAnswerHighExpert($limit = 0){
        $date = new \DateTime();
        $month = $date->format("Y-m");
        $sql = "SELECT t1.*, amount, hAmount from(SELECT expert_id, count(*) as amount from post_answers where isnull(deleted_at) and DATE_FORMAT(created_at,'%Y-%m')='".$month.
        "' GROUP BY expert_id order by count(*) desc LIMIT 5) total
        LEFT JOIN(SELECT*FROM experts where isnull(deleted_at))t1 on(total.expert_id=t1.id) left join(select user_id, count(*) as hAmount from post_data where isnull(deleted_at) and type=4 and DATE_FORMAT(created_at,'%Y-%m')='".$month."' group by user_id)t3 on(total.expert_id=t3.user_id)";

        if($limit != 0) $sql .= " limit ".$limit;

        $monthExperts = \DB::select($sql);
        // dd($monthExperts);

        return $monthExperts;
    }

    public function totalAnswerHighExpert($limit = 0){
        $sql = "select *from experts where isnull(deleted_at) order by count_answer desc";

        if($limit != 0) $sql .= " limit ".$limit;

        $experts = \DB::select($sql);

        return $experts;
    }

    public function monthHelpHighExpert($limit = 0){
        $date = new \DateTime();
        $month = $date->format("Y-m");
        $sql = "SELECT t1.*, amount, hAmount from(SELECT user_id, count(*) as hAmount from post_data where isnull(deleted_at) and type=4 and DATE_FORMAT(created_at,'%Y-%m')='".$month.
        "' GROUP BY user_id order by count(*) desc LIMIT 5) total LEFT JOIN(SELECT*FROM experts where isnull(deleted_at))t1 on(total.user_id=t1.id) left join(select expert_id, count(*) as amount from post_answers where isnull(deleted_at) and DATE_FORMAT(created_at,'%Y-%m')='".$month."' group by expert_id)t3 on(total.user_id=t3.expert_id)";

        if($limit != 0) $sql .= "limit ".$limit;

        $monthExperts = \DB::select($sql);

        return $monthExperts;
    }

    public function totalHelpHighExpert($limit = 0){
        $sql = "select *from experts where isnull(deleted_at) order by count_useful desc";

        if($limit != 0) $sql .= " limit ".$limit;

        $experts = \DB::select($sql);

        return $experts;
    }

}
