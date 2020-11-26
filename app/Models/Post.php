<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\PostAnswer;
use App\Models\PostAdd;
use App\Models\PostData;
use App\Models\Expert;

class Post extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];


    public function saveEntry(array $datas, int $userId, int $flag)
    {
        $datas["user_id"] = $userId;
        $datas['status'] = $flag;

        $Model = clone $this;

        $Model->setModel($datas);

        $Model->save();

        return $Model;
    }

    public function updateEntry(array $datas, $id, int $flag)
    {

        $Model = clone $this;
        $model = $Model->where('id',$id)->first();
        $datas['status'] = $flag;

        $model->setModel($datas);
        $model->save();

        return $model;
    }

    public function updatePostReadCount(Post $post){
        if($post->user_id == \Auth::user()->id) return;

        $count = $post->count_access;
        $count++;
        $post->count_access = $count;
        $post->update();
    }

    public function getRepost() {
        $Model = clone $this;
        $Model = $Model->where([['user_id', \Auth::user()->id],['status', 1]])->first();
        return $Model;
    }
    /**
     * 相談数の取得
     * @param  User  $User
     * @param  string  $dateYearMonth
     * @return int
     */
    public function getCountUser(User $User, string $dateYearMonth="") : int
    {
        $Model = clone $this;

        $Model = $Model->whereUserId($User->id)->whereView();

        if ($dateYearMonth){
            $Model->where("created_at", "LIKE", $dateYearMonth . "%");
        }
        return $Model->count();
    }


    public function isAnswerCheck(Post $post){
        $answerId = $post->post_answer_id;
        if($answerId != 0)  return $answerId;
        else{
            $postDate = date_create($post->created_at);
            $curDate = date_create(date('Y-m-d'));

            $interval = date_diff($curDate, $postDate);
            $misDay = $interval->format('%a');
            if($misDay > 30)    return -1;
            else    return 0;

        }
    }
    /**
     *  ステータスが2（公開済み）飲み取得
     * @param $query
     */
    public function scopeWhereView($query)
    {
        $query->whereStatus(2);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function answers(){
        return $this->hasMany(PostAnswer::class);
    }

    public function adds(){
        return $this->hasMany(PostAdd::class);
    }

}
