<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\License;


class ExpertLicense extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];


    public function getCategoryByExpertId($expert_id){
        $Model = clone $this;
        $Model = $Model->where('expert_id', $expert_id)->get();

        return $Model;
    }
}
