<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class UserPayment extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
