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
}
