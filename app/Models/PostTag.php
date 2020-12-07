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
            $model->tag_name = $tagArray[$i];
            $model->save();
        }
    }
    /**	
     * ?????????????????	
     * @param  int  $postId	
     * @param  string  $tags	
     * @return object	
     */	
    public function getText(int $postId) : string	
    {	
        $Model = clone $this;	
        $tags = $Model->wherePostId($postId)->get();	

        $text = "";	
        if ($tags){	
            foreach ($tags as $key => $tag){	
                if ($key){	
                    $text.=" ";	
                }	
                $text.= $tag->tag_name;	
            }	
        }	

        return $text;	
    }	

    /**	
     * ??????????	
     * @param  int  $postId	
     * @param  string  $tags	
     * @return object	
     */	
    public function reflash(int $postId, string $tag) : void	
    {	
        $Model = clone $this;	
        $Model->wherePostId($postId)->delete();	

        if ($tag){	
            $tags = explode(" ", $tag);	

            foreach ($tags as $tag){	
                $Model = clone $this;	
                $Model->tag_name = $tag;	
                $Model->post_id = $postId;	
                $Model->save();	
            }	
        }	
    }
}
