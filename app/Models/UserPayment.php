<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class UserPayment extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];

    public function savePayment($orderId, $type, $kind, $price){

        $model = $this->where([['type', '<>', $type], ['user_id', \Auth::user()->id]])->first();
        if($model)  $model->delete();

        $model = $this->where([['type', '=', $type], ['user_id', \Auth::user()->id]])->first();
        if($model) {
            $model->updated_at = date('Y-m-d');
            $model->save();
        }else{
            $Model = clone $this;
            $Model->order_id = $orderId;
            $Model->user_id = \Auth::user()->id;
            $Model->type = $type;
            $Model->kind = $kind;
            $Model->price = $price;
            $Model->save();
        }
    }

    public function updatePayMethod($kind){
        $Model  = clone $this;
        $Model->kind = $kind;
        $Model->save();
    }

    static public function getPaymentStatus(){
        $Model = UserPayment::where('user_id' ,\Auth::user()->id)->first();

        return $Model;
    }

    static public function getPayOrderIdByKind($pay_type){
        $Model = UserPayment::where([['type', $pay_type], ['user_id', \Auth::user()->id]])->first();

        if($Model)
            return $Model->order_id;
        else
            return 0;
    }
}
