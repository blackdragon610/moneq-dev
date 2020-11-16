<?php

namespace App\Libs;

/*
*	業者のクラス
*/

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserClass{

    public User $User;

    function __construct(User $User)
    {
        $this->User = $User;
    }


    /**
     * ユーザーの退会
     * @param  int  $userId
     */
    public function unregist(int $userId)
    {
        $Evaluation = app("Evaluation");
        $Evaluation->where("user_id", $userId)->delete();
        $UserToken = app("UserToken");
        $UserToken->where("user_id", $userId)->delete();


        $User = clone $this->User;
        $User->find($userId)->delete();
    }

    /**
     * 閲覧履歴に保存
     * @param  int  $userIdFrom
     * @param  int  $userIdTo
     */
    public function addHistory(int $userIdFrom, int $userIdTo)
    {
        $history = $this->getHistory($userIdFrom, $userIdTo)->first();

        if (!$history)
        {
            $history = clone $this->UserHistory;
        }

        $history->user_id_from = $userIdFrom;
        $history->updated_at = date("Y-m-d H:i:s");
        $history->user_id = $userIdTo;
        $history->save();
    }

    /**
     * 閲覧履歴の取得
     * @param  int  $userIdFrom
     * @param  int  $userIdTo
     * @return mixed
     */
    public function getHistory(int $userIdFrom, int $userIdTo=0)
    {
        $UserHistory = clone $this->UserHistory;

        $UserHistory = $UserHistory->where("user_id_from", $userIdFrom);

        if ($userIdTo)
        {
            $UserHistory = $UserHistory->where("user_id", $userIdTo);
        }

        return $UserHistory;

    }

    public function saveEntry(array $inputs)
    {
        $User = clone $this->User;

        $User->password = $inputs["password"];
        $User->tel = $inputs["tel"];

        $User->changePassword();


        $User->save();
    }

    /**
     * お気に入り登録/削除
     * @param  int  $id
     * @return bool
     */
    public function addDeleteFavorite(int $id, int $isDelete){
        if (!$favorite = $this->getFavorite($id)->first()){
            //存在しない場合は追加
            $Favorite =  clone $this->Favorite;
            $Favorite->user_id = Auth::user()->id;
            $Favorite->user_id_target = $id;
            $Favorite->save();

            return true;
        }else{
            //存在する場合は削除
            if ($isDelete){
                $favorite->delete();
            }

            return false;
        }
    }

    /**
     * お気に入り取得
     * @param  int  $id
     * @return mixed
     */
    public function getFavorite(int $id){
       $Favorite =  clone $this->Favorite;

       return $Favorite->where("user_id_target", $id);
    }

}

