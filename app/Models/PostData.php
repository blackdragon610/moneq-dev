<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostData extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function getPostHistoryData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId]])->first();
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
}
