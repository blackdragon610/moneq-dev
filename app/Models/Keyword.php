<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Keyword extends ModelClass
{

    protected $hidden = [
    ];

    public function saveKeyword($keyword){
        $Model = clone $this;
        $Model->keyword = $keyword;
        $Model->save();
    }
}
