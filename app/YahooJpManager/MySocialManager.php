<?php

namespace App\YahooJpManager;

use Laravel\Socialite\SocialiteManager;

class MySocialManager extends SocialiteManager
{

    protected function createYahooJpDriver()
    {
        //services.phpの設定情報を読む
        $config = $this->app['config']['services.yahoojp'];
        //設定情報と共にプロバイダを生成
        return $this->buildProvider(
            'App\YahooJpManager\YahooJpProvider',
            $config
        );
    }
}
