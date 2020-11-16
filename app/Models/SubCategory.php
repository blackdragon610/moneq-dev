<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class SubCategory extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
