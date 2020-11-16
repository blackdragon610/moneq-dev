<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostReport extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
