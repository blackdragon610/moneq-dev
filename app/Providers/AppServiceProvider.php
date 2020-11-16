<?php

namespace App\Providers;

use App\Libs\CustomerClass;
use Illuminate\Support\ServiceProvider;
use App\Libs\UtilityClass;
use App\Libs\UserAuthClass;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if (env("APP_ENV") == "server") {
            $url->forceScheme('https');
        }

        $this->Utility = new UtilityClass();
        $this->app->bind('Utility', function ($app) {
            return new UtilityClass();
        });

        $this->app->bind('AuthAccount', function ($app) {
            //管理者と顧客でAuthAccountクラスの切り分け
            if ($this->Utility->checkType('user')){
                return new UserAuthClass();
            }else{
            }
        });


        //ライブラリ
        $this->app->bind("ImageClass", "\App\Libs\ImageClass");
        $this->app->bind("UploadClass", "\App\Libs\UploadClass");
        $this->app->bind("ApiClass", "\App\Libs\ApiClass");


        //モデル
        $this->app->bind("LicenseCategory", "\App\Models\LicenseCategory");
        $this->app->bind("License", "\App\Models\License");
        $this->app->bind("Category", "\App\Models\Category");
        $this->app->bind("SubCategory", "\App\Models\SubCategory");
        $this->app->bind("Specialtie", "\App\Models\Specialtie");
        $this->app->bind("Notification", "\App\Models\Notification");
        $this->app->bind("Keyword", "\App\Models\Keyword");
        $this->app->bind("Tag", "\App\Models\Tag");
        $this->app->bind("User", "\App\Models\User");
        $this->app->bind("UserToken", "\App\Models\UserToken");
        $this->app->bind("UserDeviceToken", "\App\Models\UserDeviceToken");
        $this->app->bind("UserPayment", "\App\Models\UserPayment");

        $this->app->bind("Post", "\App\Models\Post");
        $this->app->bind("PostTag", "\App\Models\PostTag");
        $this->app->bind("PostAnswer", "\App\Models\PostAnswer");
        $this->app->bind("PostData", "\App\Models\PostData");
        $this->app->bind("PostReport", "\App\Models\PostReport");
        $this->app->bind("PostAdd", "\App\Models\PostAdd");

        $this->app->bind("Expert", "\App\Models\Expert");
        $this->app->bind("ExpertLicense", "\App\Models\ExpertLicense");
        $this->app->bind("ExpertSpecialtie", "\App\Models\ExpertSpecialtie");
        $this->app->bind("ExpertIntroduction", "\App\Models\ExpertIntroduction");

        $this->app->bind("AutoToken", "\App\Models\AutoToken");
        $this->app->bind("ChangeToken", "\App\Models\ChangeToken");
        $this->app->bind("Withdrawal", "\App\Models\Withdrawal");

        $this->app->bind("Admin", "\App\Models\Admin");










    }
}
