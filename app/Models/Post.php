<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends ModelClass
{
    use SoftDeletes;

    protected $hidden = [
    ];


    public function saveEntry(array $datas, int $userId)
    {
        $datas["user_id"] = $userId;

        $Model = clone $this;

        $Model->setModel($datas);

        $Model->save();

        return $Model;
    }

    /**
     * 相談数の取得
     * @param  User  $User
     * @param  string  $dateYearMonth
     * @return int
     */
    public function getCountUser(User $User, string $dateYearMonth="") : int
    {
        $Model = clone $this;

        $Model = $Model->whereUserId($User->id)->whereView();

        if ($dateYearMonth){
            $Model->where("created_at", "LIKE", $dateYearMonth . "%");
        }
        return $Model->count();
    }

    /**
     *  ステータスが2（公開済み）飲み取得
     * @param $query
     */
    public function scopeWhereView($query)
    {
        $query->whereStatus(2);
    }

}
