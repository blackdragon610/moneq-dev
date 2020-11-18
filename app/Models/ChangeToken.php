<?php

namespace App\Models;

use App\Models\User;

class ChangeToken extends ModelClass
{

    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
