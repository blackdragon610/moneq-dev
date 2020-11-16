<?php

namespace App\Libs;

use App\Models\PushType;
use App\Models\User;
use App\Models\UserToken;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;


/*
*	Pushの共通処理
*/
class PushClass{
    public UserToken $UserToken;
    public User $User;
    public PushType $PushType;
    public bool $isNow = true;


    function __construct(UserToken $UserToken, User $User, PushType $PushType)
    {
        $this->UserToken = $UserToken;
        $this->User = $User;
        $this->PushType = $PushType;
    }

    /**
     * デバイストークンの設定
     * @param  int  $token  トークン
     * @param  string  $os  os
     */
    public function setToken(string $token, string $userToken, string $os)
    {
        $UserToken = clone $this->UserToken;

        if (!$this->getToken(Auth::user()->id, $token)->first())
        {
            $UserToken->user_id = Auth::user()->id;
            $UserToken->token = $token;
            $UserToken->os = $os;
            $UserToken->user_token = $userToken;

            $UserToken->save();
        }
    }

    /**
     * デバイストークンの取得
     * @param  int  $userId ユーザーのID
     * @param  string  $token   トークンを指定する場合
     * @return UserToken
     */
    public function getToken(int $userId, string $token=""){
        $UserToken = clone $this->UserToken;
        $UserToken = $UserToken->where("user_id", $userId);

        if ($token){
            $UserToken = $UserToken->where("token", $token);
        }

        return $UserToken;
    }

    /**
     * デバイストークンの削除
     * @param  string  $deviceToken
     * @param  string  $os
     */
    public function deleteToken($deviceToken)
    {
        $UserToken = clone $this->UserToken;
        $tokens = $UserToken
            //->where("os", $os)
            ->where("token", $deviceToken)
            ->get();

        if ($tokens)
        {
            //トークンの削除
            foreach ($tokens as $token)
            {
                $token->delete();
            }
        }
    }

    /**
     * チャットのプッシュ
     * @param  int  $detailId
     * @param  int  $userId
     * @param  int  $userIdFrom
     * @param $serial
     * @param  array  $input
     * @return int
     * @throws \LaravelFCM\Message\Exceptions\InvalidOptionsException
     */
    public function sendChat(array $userIds, string $title, string $body, array $datas, int $chatId, int $detailId)
    {
        \Log::info($userIds);

        if (!isset($datas["mode"])){
            $datas["mode"] = "chat";
        }
        $datas["id"] = $chatId;
        $datas["detailId"] = $detailId;

        foreach ($userIds as $userId){
            $user = $this->User->find($userId);

            $PushType = app("PushType");
            $PushType->saveEntry("chat", $userId, $detailId, $chatId);

            if ($user){
                //該当ユーザーの取得
                $this->sendUser(
                    $user,
                    $title,
                    $body,
                    $datas,
                );


            }

        }



    }


    /**
     * 該当ユーザーにプッシュ通知を行い送信ユーザー数を返す
     * @param  object  $User    ユーザーのモデル
     * @param  string  $title   タイトル
     * @param  string  $message メッセージ
     * @param  array  $datas    その他送付データ
     * @return int  送信ユーザー数
     * @throws \LaravelFCM\Message\Exceptions\InvalidOptionsException
     */
    public function sendUser(object $User, string $title, string $message, $datas = []) : int
    {

        $number = 0;
        $datas["title"] = $title;
        $datas["body"] = $message;

        if (count($User->tokens)){

            foreach ($User->tokens as $token)
            {
                if ($token->token){
                    if ($this->isNow){
                        $this->sendPush($token->token, $title,$message, $User->id, $datas);
                    }
                }

            }

            if (!$this->isNow){
	            $this->Push->saveEntry($title,$message, $User->id, $datas);
	        }

            $number++;
        }


        return $number;
    }



    /**
     * プッシュの送信
     * @param  string  $token
     * @param  string  $title  タイトル
     * @param  string  $message  内容
     * @param  int  $userId ユーザーのID
     * @param  array  $datas  その他データ
     * @throws \LaravelFCM\Message\Exceptions\InvalidOptionsException
     */
    public function sendPush(string $token, string $title, string $message, int $userId, $datas = [])
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($message)
            ->setSound("receive.caf")
            //->setSound("receive")
            //->setSound("https://buttobi.new-challenge.jp/receive.caf")
            //->setIcon("https://s.yimg.jp/c/logo/f/2.0/news_r_34_2x.png")
            ->setBadge($this->getBadgeAll($userId));

        //dd(file_get_contents(dirname(__FILE__) . "/../Front/Sound/receive.mp3"));

        $dataBuilder = new PayloadDataBuilder();
        //$datas["notification_foreground"] = "true";
        //$dataBuilder->addData(["data" => $datas]);


        $dataBuilder->addData(["notification_android_sound" => "receive", "notification_foreground" => "true", "data" => $datas]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();
        $downstreamResponse->tokensWithError();
    }

    public function getBadgeAll(int $userId)
    {
        $PushType = clone $this->PushType;
        $badge = $PushType->getBadge($userId);

        return $badge;
    }

}

