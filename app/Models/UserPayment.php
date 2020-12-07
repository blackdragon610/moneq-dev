<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class UserPayment extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function savePayment($orderId, $type, $price){

        $model = $this->where('user_id', \Auth::user()->id)->first();
        if($model)  $model->delete();

        if($type == 3)  $type = 1;
        $Model = clone $this;
        $Model->order_id = $orderId;
        $Model->user_id = \Auth::user()->id;
        $Model->type = $type;
        $Model->price = $price;
        $Model->save();
    }

    static public function getPaymentStatus(){
        $Model = UserPayment::where('user_id' ,\Auth::user()->id)->first();

        return $Model;
    }
}
