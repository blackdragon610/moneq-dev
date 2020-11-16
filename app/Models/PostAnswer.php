<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class PostAnswer extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
