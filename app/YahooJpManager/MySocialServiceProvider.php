<?php

namespace App\YahooJpManager;

use Laravel\Socialite\SocialiteServiceProvider;

class MySocialServiceProvider extends SocialiteServiceProvider
{
    public function register()
    {
        //シングルトンとしてMySocialManagerを生成
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new MySocialManager($app);
        });
    }
}
