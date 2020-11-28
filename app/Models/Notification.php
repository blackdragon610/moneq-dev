<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Notification extends ModelClass
{

    protected $hidden = [
    ];

    public function getNewNotification(){
        $model = Post::orderBy('created_at', 'desc')
                        ->paginate(3);
        return $model;
    }

    public function updateReady($id){
        $model = $this->find($id);
        $model->unread = 0;
        $model->save();
    }
}
