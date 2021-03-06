<?php

    namespace App\Libs;

    /**
    *	SMSの処理
    */

    use Nexmo\Client;
    use Nexmo\Client\Credentials\Basic;
    use Nexmo\Laravel\Facade\Nexmo;

    class SmsClass{

        function __construct()
        {

        }

        /**
         * SMSの送信
         * @param string $tel 電話番号
         * @param string $template
         * @param array $datas
         */
        public function send(string $tel, string $template, array $datas=[])
        {
            $datas["domain"] = getMyURL();

            $text = getTemplate('messages.smss.' . $template, $datas);


            $to = "81" . str_replace("-", "", substr($tel, 1, strlen($tel)));

            Nexmo::message()->send([
                'to'   => $to,
                'from' => '8107014201488',
                'text' => $text
                ]);
            // $sms = config("sms");
            // $basic  = new Basic($sms["API_KEY"], $sms["API_SECRET"]);
            // $client = new Client($basic);
            // dd($client);


            // $message = $client->message()->send([
            //                                         'type' => 'unicode',
            //                                         'to' => $to,
            //                                         'from' => env("APP_NAME"),
            //                                         'text' => $text
            //                                     ]);

        }
    }

