<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\PostAnswer;
use App\Models\PostAdd;
use App\Models\SubCategory;
use App\Models\PostData;
use App\Models\Expert;
use Illuminate\Support\Facades\DB;

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

    public function getAccessTopPosts(){
        $model = Post::where('id', '>' ,0)
                ->orderBy('count_access', 'desc')
                ->orderBy('count_usuful', 'desc')
                ->paginate(10);
        return $model;
    }

    public function getNewTopPosts(){
        $Model = Post::where('id', '>' ,0)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        return $Model;
    }

    public function getSelfPosts(){
        $Model = $this->where('user_id', \Auth::user()->id)
                      ->orderBy('created_at', 'desc')
                      ->paginate(3);
        return $Model;
    }

    public function isAnswerCheck(){
        // dd($this->post_answer_id);
        $answerId = $this->post_answer_id;
        if($answerId != 0)  return $answerId;
        else{
            $postDate = date_create($this->created_at);
            $curDate = date_create(date('Y-m-d'));

            $interval = date_diff($curDate, $postDate);
            $misDay = $interval->format('%a');
            if($misDay > 30)    return -1;
            else    return 0;

        }
    }

    public function getPostCount(){
        $model = $this->selectRaw("count(*) as postCount")->first();

        return $model->postCount;
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

    public function answerCount(){
        $postAnswers = PostAnswer::where('post_id', $this->id)->get();
        return count($postAnswers);
    }

    public function adds(){
        return $this->hasMany(PostAdd::class);
    }

    public function sub_category(){
        // dd($this->belongsTo(SubCategory::class));
        return $this->belongsTo(SubCategory::class);
    }
}
