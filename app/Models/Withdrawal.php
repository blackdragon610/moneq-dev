<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Withdrawal extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];
    
    public function expert()	
    {	
        return $this->belongsTo(app("Expert"));	
    }
}
