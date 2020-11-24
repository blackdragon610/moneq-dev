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
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId]]);
        if($postData)   return $postData;
        else    return $PostData;
    }

    public function getPostStoreData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId], ['type',2]]);
        if($postData)   return 1;
        else    return 0;
    }

    public function getPostHelpData($userId, $postId){
        $PostData = clone $this;
        $postData = $PostData->where([['user_id',$userId],['post_id', $postId], ['type',3]]);
        if($postData)   return 1;
        else    return 0;
    }
}
