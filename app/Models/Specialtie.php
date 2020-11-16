<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Specialtie extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];


    public function getSelect() : array
    {
        $selects = $this->get();

        foreach ($selects as $select){
            $result[$select->id] = $select->specialtie_name;
        }


        return $result;
    }
}
