<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\PostAnswer;


class PostData extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function getPostHistoryData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId], ['type', 1],['post_id', $postId]])->first();
        if($postData)   return $postData;
        else    return $PostData;
    }

    public function getPostStoreData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId], ['type',2]])->first();
        if($postData)   return 1;
        else    return 0;
    }

    public function getPostHelpData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId], ['type',3]])->first();
        if($postData)   return 1;
        else    return 0;
    }

    public function getHelpCount(){
        $model = $this->selectRaw("count(*) as helpCount")->first();

        return number_format($model->helpCount);
    }

    public function getAccessPosts(){
        $models = $this->leftJoin('posts', 'posts.id', '=', 'post_data.post_id')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select(DB::raw('posts.*, sub_name, nickname, date_birth, gender, posts.id as pId'))
        ->where('post_data.type', 1)
        ->where('post_data.user_id', \Auth::user()->id)
        ->orderBy('post_data.created_at', 'desc')
        ->paginate(30);

        return $models;
    }

    public function getStorePosts(){
        $models = $this->leftJoin('posts', 'posts.id', '=', 'post_data.post_id')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select(DB::raw('posts.*, sub_name, nickname, date_birth, gender, posts.id as pId'))
        ->where('post_data.type', 2)
        ->where('post_data.user_id', \Auth::user()->id)
        ->orderBy('post_data.created_at', 'desc')
        ->paginate(30);

        return $models;
    }


    public function answerCount($id = 0){
        $postAnswers = PostAnswer::where('post_id', $id)->get();
        return count($postAnswers);
    }


}
