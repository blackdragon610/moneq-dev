<?php

namespace App\Libs;

/*
*	ログインユーザーの共通処理
*/
class PayClass{
    public string $password = "9fdc46811e464c9781a413e2cc101233";

    public function check(string $receipt)
    {
        $client = new \GuzzleHttp\Client(
            [\GuzzleHttp\RequestOptions::VERIFY => false]
        );

        $url  = "https://sandbox.itunes.apple.com/verifyReceipt";

        $response = $client->request('POST', $url, [
            'json' => [
                'receipt-data' => $receipt,
                'password' => $this->password,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            // 何かしらの通信エラー
            \Log::info("appleへの通信エラー");
        }


        $body = json_decode($response->getBody()->getContents(), true);


        if (!isset($body['status'])){
            return false;
        }
        $isPay = 1;
        if ($body['status'] !== 0) {
            //無効
            $isPay = 0;
        }

        return $isPay;

    }
}
