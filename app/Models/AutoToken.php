<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;


class AutoToken extends ModelClass
{

    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
