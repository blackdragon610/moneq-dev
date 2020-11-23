<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostTag extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function saveEntry($tagStr, $postId){
        $tagArray = explode(' ', $tagStr);
        for($i = 0; $i<count($tagArray); $i++){
            $model = new PostTag();
            $model->post_id = $postId;
            $model->tag = $tagArray[$i];
            $model->save();
        }
    }
}
