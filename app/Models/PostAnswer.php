<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modles\User;
use App\Models\Expert;
use App\Models\Post;
use App\Models\PostData;


class PostAnswer extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function saveEntry(array $inputs)	
    {	
        $Model = clone $this;	

        if (!empty($inputs["id"])){	
            $Model = $Model->whereId($inputs["id"])->first();	
        }	


        $Model->setModel($inputs);	

        $Model->save();	

        return $Model;	
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function expert(){
        return $this->belongsTo(Expert::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function postData(){
        $postData = PostData::where([['post_id', $this->id],['type', 4]])->get();
        return $postData;
    }

    public function getAnswerCount(){
        $model = $this->selectRaw("count(*) as answerCount")->first();

        return $model->answerCount;
    }

    public function weekHighExpert(){
        $date = new \DateTime();
        $week = $date->format("W");
        $sql = "SELECT t1.*, amount from(SELECT expert_id, count(*) as amount from post_answers where week(created_at,3)=".($week)." GROUP BY expert_id
                order by count(*) desc LIMIT 5) total LEFT JOIN(SELECT*FROM experts)t1 on(total.expert_id=t1.id)";
        $weekExperts = \DB::select($sql);

        return $weekExperts;
    }

    public function monthHighExpert($limit = 0){
        $date = new \DateTime();
        $month = $date->format("Y-m");
        $sql = "SELECT t1.*, amount from(SELECT expert_id, count(*) as amount from post_answers where DATE_FORMAT(created_at,'%Y-%m')='".$month.
        "' GROUP BY expert_id order by count(*) desc LIMIT 5) total LEFT JOIN(SELECT*FROM experts)t1 on(total.expert_id=t1.id)";

        if($limit != 0) $sql .= "limit ".$limit;

        $monthExperts = \DB::select($sql);

        return $monthExperts;
    }

    public function totalHighExpert($limit = 0){
        $sql = "SELECT t1.*, amount from(SELECT expert_id, count(*) as amount from post_answers GROUP BY expert_id order by count(*) desc LIMIT 5) total
        LEFT JOIN(SELECT*FROM experts)t1 on(total.expert_id=t1.id)";
        $totalExperts = \DB::select($sql);

        if($limit != 0) $sql .= "limit ".$limit;

        return $totalExperts;
    }


}
