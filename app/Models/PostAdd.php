<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostAdd extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
