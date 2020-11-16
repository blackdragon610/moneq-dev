<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class LicenseCategory extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

}
