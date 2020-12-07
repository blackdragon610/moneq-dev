<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class ExpertIntroduction extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

 public function saveEntry(array $inputs)	
    {	
        $Model = clone $this;	

        if (!empty($inputs["id"])){	
            $Model = $Model->whereId($inputs["id"])->first();	
        }	


        $Model->setModel($inputs);	

        $Model->save();	

        return $Model;	
    }	

    /**	
     * ?????	
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo	
     */	
    public function scopeTotal($query, $mode="") : void	
    {	
        $query->select(\DB::raw("SUM(expert_introductions.money) as total"));	

        if ($mode == "month"){	
            //??	
            $query->where("expert_introductions.created_at", "LIKE", date("Y-m") . "%");	
        }	
        if ($mode == "day"){	
            //??	
            $query->where("expert_introductions.created_at", "LIKE", date("Y-m-d") . "%");	
        }	
    }	

    public function expert()	
    {	
        return $this->belongsTo(app("Expert"));	
    }	
    public function user()	
    {	
        return $this->belongsTo(app("User"));	
    }
}
