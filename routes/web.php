<?php

/*
    ルータの設定
*/

//フロント
Route::group(['middleware' => 'common:user'], function () {
    // Route::group(['middleware' => 'auth:user'], function () {
        //通常の人のプロフィール
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/update', 'ProfileController@update')->name('profile.update');
        Route::any('profile/plus', 'ProfileController@plus')->name('profile.plus');
        Route::post('profile/update/plus', 'ProfileController@updatePlus')->name('profile.updatePlus');
        Route::get('profile/update/end', 'ProfileController@end')->name('profile.end');
        Route::get('profile/manage', 'ProfileManageController@index')->name('profiles.manage');
        Route::get('profile/manage/email', function() { return view('profiles.edit.email');})->name('profiles.email');
        Route::post('profile/manage/email', 'ProfileManageController@emailUpdate')->name('profiles.email.update');
        Route::get('profile/manage/password', function() { return view('profiles.edit.password');})->name('profiles.password');
        Route::post('profile/manage/password', 'ProfileManageController@passwordUpdate')->name('profiles.password.update');
        Route::get('profile/manage/profile', 'ProfileManageController@profileEdit')->name('profiles.profile');
        Route::post('profile/manage/profile', 'ProfileManageController@profileUpdate')->name('profiles.profile.update');
        Route::get('profile/manage/notification', 'ProfileManageController@notification')->name('profiles.notification');
        Route::post('profile/manage/notification', 'ProfileManageController@notificationUpdate')->name('profiles.notification.update');
        Route::get('profile/manage/membership', 'ProfileManageController@membership')->name('profiles.membership');
        Route::get('profile/manage/membership/payment', 'ProfileManageController@memberPayment')->name('profiles.membership.payment');
        Route::get('profile/manage/membership/payment/delete', 'ProfileManageController@memberPayDelete')->name('profiles.membership.payment.delete');

        //相談の投稿
        Route::get('post/create', 'PostController@create')->name('post.create');
        Route::post('post/store', 'PostController@store')->name('post.store');
        Route::get('post/end', 'PostController@end')->name('post.end');
        Route::get('post/detail/{id}', 'PostController@end')->name('post.detail');
    // });

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
    Route::get('sns/facebook/callback', 'Auth\FacebookController@authCallback');

    // LINEの認証画面に遷移
    Route::get('sns/line/login', 'Auth\LineController@redirectToProvider')->name('line.login');
    // 認証後にリダイレクトされるURL(コールバックURL)
    Route::get('sns/line/callback', 'Auth\LineController@handleProviderCallback');

    //Google
    Route::get('sns/google/login', 'Auth\GooglePlusController@getAuth');
    Route::get('login/google/callback', 'Auth\GooglePlusController@authCallback');

    //Yahooログイン（ボタンのリンク先）
    Route::get('sns/yahoojp/login', 'YahooJapanIdController@yahoojpLogin');
    //認証後の戻りURL
    Route::get('sns/yahoojp/callback', 'YahooJapanIdController@yahoojpCallback');

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

    //画像
    Route::get('api/image', 'ImageController@index')->name('api.image');

    Route::get('mockup', 'MockupUIController@index');

});
