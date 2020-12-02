<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class SubCategory extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function getCategoryName($id){
        $model = $this->find($id);

        return $model->sub_name;
    }

}
