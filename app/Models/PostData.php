<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostData extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
