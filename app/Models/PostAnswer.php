<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modles\User;
use App\Models\Expert;



class PostAnswer extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function expert(){
        return $this->belongsTo(Expert::class);
    }

}
