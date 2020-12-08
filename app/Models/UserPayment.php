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

        $Model = clone $this;
        $Model->order_id = $orderId;
        $Model->user_id = \Auth::user()->id;
        $Model->type = $type;
        $Model->price = $price;
        $Model->save();
    }

    public function updatePayMethod($type){
        $Model  = clone $this;
        $Model->type = $type;
        $Model->save();
    }

    static public function getPaymentStatus(){
        $Model = UserPayment::where('user_id' ,\Auth::user()->id)->first();

        return $Model;
    }

    static public function getPayOrderIdByType($pay_type){
        $Model = UserPayment::where([['type', $pay_type], ['user_id', \Auth::user()->id]])->first();

        if($Model)
            return $Model->order_id;
        else
            return 0;
    }
}
