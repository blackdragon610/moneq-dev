<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin  extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'tel', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function changePassword()
    {
        if (!empty($this->password)){
            $this->password_plain = $this->password;
            $this->password = changeHashPassword($this->password);
        }
    }

    public function saveEntry(array $inputs)
    {
        $Model = clone $this;

        if (!empty($inputs["id"])){
            $Model = $Model->whereId($inputs["id"])->first();
        }

        foreach ($inputs as $key => $input){
            if ($key != "id"){
                $Model->$key = $input;
            }
        }

        if ($Model->password_plain){
            $Model->password = $Model->password_plain;
        }

        $Model->changePassword();


        unset($Model->_method);
        unset($Model->fileType);
        unset($Model->_token);
        unset($Model->end);


        $Model->save();

    }


}
