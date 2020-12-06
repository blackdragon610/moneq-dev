<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class ExpertSpecialtie extends ModelClass
{


    protected $hidden = [
    ];

    public function saveEntry($expertId, $datas)
    {
        $Model = clone $this;
        $Model->whereExpertId($expertId)->delete();

        foreach ($datas as $specialtie){
            $Model = clone $this;

            $Model->expert_id = $expertId;
            $Model->specialtie_id = $specialtie;
            $Model->save();

        }
    }

}
