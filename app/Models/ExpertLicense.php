<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class ExpertLicense extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
