<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class License extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
