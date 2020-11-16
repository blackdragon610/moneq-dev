<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostTag extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
