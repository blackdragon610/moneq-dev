<?php

namespace App\Libs;

/*
*	APIの共通処理
*/
class ApiClass{


    /**
     * APIでエラーが発生した際のレスポンス
     * @param  string  $message
     * @return object
     */
    public function responseError(string $message) : object
    {

        return response()->json(["result" => "NG", "message" => $message], 200)
            ->header('Access-Control-Allow-Origin', getVariable($_SERVER, 'HTTP_ORIGIN'))
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Max-Age', '86400')
        ;
    }

    /**
     * APIで問題がない場合の際のレスポンス
     * @param  array  $data
     * @return object
     */
    public function responseOk(array $data = []) : object
    {
        return response()->json(array_merge(['result' => "OK"], $data), 200 )
            ->header('Access-Control-Allow-Origin', getVariable($_SERVER, 'HTTP_ORIGIN'))
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Max-Age', '86400')
        ;
    }

}

