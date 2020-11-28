<?php

/*
    ルータの設定
*/

//フロント
Route::group(['middleware' => 'common:user'], function () {
    Route::group(['middleware' => 'auth:user'], function () {
        //通常の人のプロフィール
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/update', 'ProfileController@update')->name('profile.update');
        Route::any('profile/plus', 'ProfileController@plus')->name('profile.plus');
        Route::post('profile/update/plus', 'ProfileController@updatePlus')->name('profile.updatePlus');
        Route::get('profile/update/end', 'ProfileController@end')->name('profile.end');

        //普通の人のプロフィールを更新
        Route::get('profile/manage', 'ProfileManageController@index')->name('profiles.manage');
        Route::get('profile/manage/email', function() { return view('profiles.edit.email');})->name('profiles.email');
        Route::get('profile/manage/change/email', 'ProfileManageController@emailChange')->name('profiles.email.change');
        Route::post('profile/manage/email', 'ProfileManageController@emailUpdate')->name('profiles.email.update');
        Route::get('profile/manage/password', function() { return view('profiles.edit.password');})->name('profiles.password');
        Route::post('profile/manage/password', 'ProfileManageController@passwordUpdate')->name('profiles.password.update');
        Route::get('profile/manage/change/password', 'ProfileManageController@emailPassword')->name('profiles.password.change');
        Route::get('profile/manage/profile', 'ProfileManageController@profileEdit')->name('profiles.profile');
        Route::post('profile/manage/profile', 'ProfileManageController@profileUpdate')->name('profiles.profile.update');
        Route::get('profile/manage/notification', 'ProfileManageController@notification')->name('profiles.notification');
        Route::post('profile/manage/notification', 'ProfileManageController@notificationUpdate')->name('profiles.notification.update');
        Route::get('profile/manage/membership', 'ProfileManageController@membership')->name('profiles.membership');
        Route::get('profile/manage/membership/payment', 'ProfileManageController@memberPayment')->name('profiles.membership.payment');
        Route::get('profile/manage/membership/payment/delete', 'ProfileManageController@memberPayDelete')->name('profiles.membership.payment.delete');

        //ポスト検索


        //相談の投稿
        Route::get('post/create', 'PostController@create')->name('post.create');
        Route::post('post/store', 'PostController@store')->name('post.store');
        Route::post('post/preStore', 'PostController@preStore')->name('post.preStore');
        Route::get('post/end', 'PostController@end')->name('post.end');
        Route::get('post/detail/{id}', 'PostController@detail')->name('post.detail');
        Route::get('post/data/{pid}/{val}', 'PostController@postDataEntry')->name('post.data');
        Route::get('post/answer/{pid}/{aid}', 'PostController@postAnswerCheck')->name('post.answer.check');
        Route::get('post/answer/help/{aid}/{eid}', 'PostController@postAnswerEntry')->name('post.answer.help');
        Route::get('post/report/{pId}', 'PostController@report')->name('post.report');
        Route::post('post/report/end', 'PostController@reportEnd')->name('post.report.end');
        Route::get('post/report/add/{pId}', 'PostController@reportAdd')->name('post.report.add');
        Route::post('post/report/add/end', 'PostController@reportAddEnd')->name('post.report.add.end');

        Route::get('expert/detail/{id}', 'ExpertProfileController@detail')->name('expert.detail');
        Route::get('expert/message/{id}', 'ExpertProfileController@message')->name('expert.message');
        Route::post('expert/message/send', 'ExpertProfileController@send')->name('expert.message.send');

        Route::post('search', 'SearchController@index')->name('search.category');
        Route::get('notification', 'TopController@notification')->name('notification');
        Route::get('notification/route/{type}/{id}', 'TopController@route')->name('notification.route');
    });

    //相談の投稿検索
    Route::get('post/search', 'PostController@search')->name('post.search');


    Route::group(['middleware' => 'auth:expert'], function () {
        //専門家のプロフィール
        Route::get('expert/profile/edit', 'ExpertProfileController@edit')->name('expert.profile.edit');
        Route::post('expert/profile/update', 'ExpertProfileController@update')->name('expert.profile.update');
        Route::get('expert/profile/end', 'ExpertProfileController@end')->name('expert.profile.end');
    });

    //ログイン関連
    Route::get('login', 'LoginController@index')->name('login');
    // Route::post("auth", "Auth\AuthController@login")->name("auth");
    Route::post('auth', 'Auth\AuthController@login')->name('auth');
    Route::get("auth/sns", "Auth\AuthController@snsLogin")->name("auth.sns");

    //Twitter
    Route::get('sns/twitter/login', 'Auth\TwitterController@getAuth');
    Route::get('sns/twitter/callback', 'Auth\TwitterController@authCallback');

    //Facebook
    Route::get('sns/facebook/login', 'Auth\FacebookController@getAuth');
    Route::get('auth/facebook/callback', 'Auth\FacebookController@authCallback');

    // LINEの認証画面に遷移
    Route::get('sns/line/login', 'Auth\LineController@redirectToProvider')->name('line.login');
    // 認証後にリダイレクトされるURL(コールバックURL)
    Route::get('sns/line/callback', 'Auth\LineController@handleProviderCallback');

    //Google
    Route::get('sns/google/login', 'Auth\GooglePlusController@getAuth');
    Route::get('login/google/callback', 'Auth\GooglePlusController@authCallback');

    //Yahooログイン（ボタンのリンク先）
    Route::get('sns/yahoojp/login', 'Auth\YahooJapanIdController@yahoojpLogin');
    //認証後の戻りURL
    Route::get('yahoojp/callback', 'Auth\YahooJapanIdController@yahoojpCallback');

    //ユーザー登録関連
    Route::get('entry', 'EntryController@index')->name('entry');
    Route::post('entry/send', 'EntryController@send')->name('entry.send');
    Route::get('entry/send/end', 'EntryController@sendEnd')->name('entry.send.end');
    Route::get('entry/password', 'EntryController@password')->name('entry.password');
    Route::post('entry/password/end', 'EntryController@passwordEnd')->name('entry.password.end');
    Route::get('entry/expert/password', 'EntryController@expertPassword')->name('entry.expert.password');
    Route::post('entry/expert/password/end', 'EntryController@expertPasswordEnd')->name('entry.expert.password.end');


    Route::get('error/{mode}', 'ErrorController@other')->name('error');
    Route::get('error', 'ErrorController@index')->name('error');
    Route::get('', 'TopController@index')->name('top');
    Route::get('search/{key}', 'TopController@searchEngine')->name('search');

    //画像
    Route::get('api/image', 'ImageController@index')->name('api.image');

    Route::get('mockup', 'MockupUIController@index');

    //GMO
    Route::get('payment/creditcard', 'GMOManager@paymentByCreditCard')->name('payment.creditcard');
    Route::get('payment/au', 'GMOManager@paymentByAu')->name('payment.au');
    Route::get('payment/docomo', 'GMOManager@paymentByDocomo')->name('payment.docomo');
    Route::get('payment/softbank', 'GMOManager@paymentBySoftbank')->name('payment.softbank');

});
