<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\License;


class ExpertLicense extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function license(){
        return $this->belongsTo(License::class);
    }

}
