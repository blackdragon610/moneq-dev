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

        $monthExperts = Expert::leftJoin(\DB::raw("(SELECT expert_id, count(*) as amount from post_answers where
                                                    DATE_FORMAT(created_at,'%Y-%m')='".$month."' GROUP BY expert_id)t1"),
                                                    function ($join) {
                                                        $join->on ( 'experts.id', '=', 't1.expert_id' );
                                                    })
                            ->leftJoin(\DB::raw("(select user_id, count(*) as hAmount from post_data
                                                    where type=4 and DATE_FORMAT(created_at,'%Y-%m')='".$month."' group by user_id)t2"),
                                                    function($join){
                                                        $join->on('expert_id', '=', 't2.user_id');
                                                    })
                            ->where('count_answer', '>', 0)
                            ->orderBy('amount', 'desc')
                            ->orderBy('hAmount', 'desc')
                            ->paginate($limit);

        return $monthExperts;
    }

    public function totalAnswerHighExpert($limit = 0){

        $experts = Expert::where('count_answer', '>', 0)->orderBy('count_answer', 'desc')->paginate($limit);

        return $experts;
    }

    public function monthHelpHighExpert($limit = 0){
        $date = new \DateTime();
        $month = $date->format("Y-m");
        $monthExperts = Expert::leftJoin(\DB::raw("(SELECT expert_id, count(*) as amount from post_answers where
                                                    DATE_FORMAT(created_at,'%Y-%m')='".$month."' GROUP BY expert_id)t1"),
                                                    function ($join) {
                                                        $join->on ( 'experts.id', '=', 't1.expert_id' );
                                                    })
                            ->leftJoin(\DB::raw("(select user_id, count(*) as hAmount from post_data
                                                    where type=4 and DATE_FORMAT(created_at,'%Y-%m')='".$month."' group by user_id)t2"),
                                                    function($join){
                                                        $join->on('expert_id', '=', 't2.user_id');
                                                    })
                            ->where('count_answer', '>', 0)
                            ->orderBy('hAmount', 'desc')
                            ->orderBy('amount', 'desc')
                            ->paginate($limit);
        return $monthExperts;
    }

    public function totalHelpHighExpert($limit = 0){

        $experts = Expert::where('count_answer', '>', 0)->orderBy('count_useful', 'desc')->paginate($limit);

        return $experts;
    }

    public function expert(){
        return $this->hasMany(ExpertLicense::class);
    }

    /**
     * 専門家の名前取得
    */
    public function expertName() : string
    {

        return $this->expert_name_second . "　" . $this->expert_name_first;
    }

 /**
     * 回答取得
     */
    public function scopeAnalytics($query, array $types, bool $isAll = false)
    {

        $query->leftJoin("post_answers", "post_answers.expert_id", "=", "experts.id");

        $select = "";

        //各自判定
        if (in_array("answer", $types)){
            if (!$isAll) {
                $select .= ",experts.count_answer";
            }else {
                $select .= ",sum(distinct experts.count_answer) as count_answer";
            }
        }
        if (in_array("access", $types)){
            $query->leftJoin("posts", "post_answers.post_id", "=", "posts.id");

            $select .= ",sum(distinct count_access) as count_access";
        }

        if (in_array("page_access", $types)){
            if (!$isAll){
                $select.=",count_page_access";
            }else{
                $select.=",sum(distinct count_page_access) as count_page_access";
            }
        }
        if (in_array("message", $types)){
            if (!$isAll){
                $select.=",count_message";
            }else{
                $select.=",sum(distinct count_message) as count_message";
            }
        }

        if ((in_array("introduction", $types)) || (in_array("introduction_money", $types))){
            $query->leftJoin("expert_introductions", "expert_introductions.expert_id", "=", "experts.id");
        }

        if (in_array("introduction", $types)){
            $select.=",count(distinct expert_introductions.id) as count_introduction";
        }
        if (in_array("introduction_money", $types)){
            $select.=",sum(distinct expert_introductions.money) as count_introduction_money";
        }


        if (!$isAll){
            $query = $query->groupBy("experts.id");
        }

        $query->select(\DB::raw("experts.*" . $select));
    }


    /**
     *   報酬額
     */
    public function getPostIntroduction()
    {
        $ExpertIntroduction = app("ExpertIntroduction");
        if ($this->id){
            $ExpertIntroduction  = $ExpertIntroduction ->where("expert_introductions.expert_id", $this->id);
        }

        $ExpertIntroduction->select(\DB::raw("*,sum(money)"));

        return $ExpertIntroduction;
    }

    public function getCategoryByExpertId(){

        $Model = ExpertLicense::where('expert_id', $this->id)->get();

        return $Model;
    }


}
