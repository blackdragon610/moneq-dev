<?php

/*
    ルータの設定
*/

//フロント

use App\Http\Controllers\GMOManager;

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
        Route::get('profile/manage/email/update', 'ProfileManageController@emailUpdate')->name('profiles.email.update');
        Route::get('profile/manage/change/email', 'ProfileManageController@emailChange')->name('profiles.email.change');
        Route::get('profile/manage/password', function() { return view('profiles.edit.password');})->name('profiles.password');
        Route::get('profile/manage/password/update', 'ProfileManageController@passwordUpdate')->name('profiles.password.update');
        Route::get('profile/manage/change/password', 'ProfileManageController@emailPassword')->name('profiles.password.change');
        Route::get('profile/manage/profile', 'ProfileManageController@profileEdit')->name('profiles.profile');
        Route::get('profile/manage/profile/update', 'ProfileManageController@profileUpdate')->name('profiles.profile.update');
        Route::get('profile/manage/notification', 'ProfileManageController@notification')->name('profiles.notification');
        Route::get('profile/manage/notification/update', 'ProfileManageController@notificationUpdate')->name('profiles.notification.update');
        Route::get('profile/manage/membership', 'ProfileManageController@membership')->name('profiles.membership');
        Route::get('profile/manage/membership/payment', 'ProfileManageController@memberPayment')->name('profiles.membership.payment');
        Route::get('profile/manage/membership/payment/delete', 'ProfileManageController@memberPayDelete')->name('profiles.membership.payment.delete');
        Route::get('profile/manage/payment', 'ProfileManageController@paymentInfo')->name('payment.info');
        Route::get('profile/manage/payment/update/{type}', 'ProfileManageController@paymentInfoupdate')->name('payment.update');

        //ポスト検索


        //相談の投稿
        Route::get('post/create', 'PostController@create')->name('post.create');
        Route::post('post/store', 'PostController@store')->name('post.store');
        Route::post('post/preStore', 'PostController@preStore')->name('post.preStore');
        Route::get('post/end', 'PostController@end')->name('post.end');
        Route::get('post/data/{pid}/{val}', 'PostController@postDataEntry')->name('post.data');
        Route::get('post/answer/{pid}/{aid}', 'PostController@postAnswerCheck')->name('post.answer.check');
        Route::get('post/answer/help/{aid}/{eid}', 'PostController@postAnswerEntry')->name('post.answer.help');
        Route::get('post/report/{pId}', 'PostController@report')->name('post.report');
        Route::post('post/report/end', 'PostController@reportEnd')->name('post.report.end');
        Route::get('post/report/add/{pId}', 'PostController@reportAdd')->name('post.report.add');
        Route::post('post/report/add/end', 'PostController@reportAddEnd')->name('post.report.add.end');

        Route::get('expert/detail/{id}', 'ExpertProfileController@detail')->name('expert.detail');
        Route::get('expert/detail/{id}/{postId}', 'ExpertProfileController@detail')->name('expert.detail.post');
        Route::get('expert/message/{id}', 'ExpertProfileController@message')->name('expert.message');
        Route::post('expert/message/send', 'ExpertProfileController@send')->name('expert.message.send');
        Route::get('expert/message/send/end', 'ExpertProfileController@messageEnd')->name('expert.message.end');

        Route::post('search', 'SearchController@index')->name('search.category');
        Route::get('notification', 'TopController@notification')->name('notification');
        Route::get('repost', 'TopController@repost')->name('repost');
        Route::get('paymentStatusChange', 'TopController@paymentStatusChange');
        Route::get('notification/route/{type}/{id}', 'TopController@route')->name('notification.route');

        //GMO
        Route::get('payment/{sheetId}/{member}', 'GMOManager@index')->name('payment');
        Route::get('payments/input/{sheetId}/{member}', 'GMOManager@input')->name('payment.input');
        Route::post('payment/creditcard', 'GMOManager@paymentByCreditCard')->name('payment.creditcard');
        Route::get('paymenta/au/{sheetId}/{member}', 'GMOManager@paymentByAu')->name('payment.au');
        Route::get('paymenta/docomo/{sheetId}/{member}', 'GMOManager@paymentByDocomo')->name('payment.docomo');
        Route::get('paymenta/softbank/{sheetId}/{member}', 'GMOManager@paymentBySoftbank')->name('payment.softbank');
        Route::get('payment/end', 'GMOManager@end')->name('payment.end');

        Route::get('other/self', 'OtherController@selfPostData')->name('other.self');
        Route::get('other/access', 'OtherController@accessPostData')->name('other.access');
        Route::get('other/store', 'OtherController@storePostData')->name('other.store');

    });

    //post detail
    Route::get('post/detail/{id}', 'PostController@detail')->name('post.detail');


    //相談の投稿検索
    Route::post('post/search', 'SearchController@index')->name('search.post');
    Route::get('post/search/tema', 'SearchController@searchTema')->name('search.tema');
    Route::get('post/search/category', 'SearchController@searchCategory')->name('search.category');
    Route::get('expert/search', 'SearchController@searchExpert')->name('search.expert');


    Route::group(['middleware' => 'auth:expert'], function () {
        //専門家のプロフィール
        Route::get('expert/profile/edit', 'ExpertProfileController@edit')->name('expert.profile.edit');
        Route::post('expert/profile/update', 'ExpertProfileController@update')->name('expert.profile.update');
        Route::get('expert/profile/end', 'ExpertProfileController@end')->name('expert.profile.end');

	//専門家のマイページ
        Route::get('expert/top', 'ExpertController@index')->name('expert.top');

    });

    //ログイン関連
    Route::get('login', 'LoginController@index')->name('login');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');
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

    Route::get('change/email', 'ProfileManageController@emailChange');
    Route::get('change/password', 'ProfileManageController@passwordChange');



    Route::get('error/{mode}', 'ErrorController@other')->name('error');
    Route::get('error', 'ErrorController@index')->name('error');
    Route::get('error/payment', 'ErrorController@payment')->name('error.payment');
    Route::get('', 'TopController@index')->name('top');
    Route::get('search/{key}', 'TopController@searchEngine')->name('search');
    Route::post('search', 'TopController@search')->name('search.post');

    //画像
    Route::get('api/image', 'ImageController@index')->name('api.image');

    Route::get('mockup', 'MockupUIController@index');

});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'common:admin'], function() {
    //管理画面
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('', 'Admin\IndexController@index')->name('');
        Route::any('logout', 'Admin\Auth\AuthController@logout')->name('logout');


        Route::any('post/{postId}/status', 'Admin\PostController@status')->name("post.status");
        Route::any('post/finished', 'Admin\PostController@finished')->name("post.finished");
        Route::resource('post', 'Admin\PostController');

        Route::any('answer/finished', 'Admin\AnswerController@finished')->name("answer.finished");
        Route::resource('answer', 'Admin\AnswerController');

        Route::any('user/finished', 'Admin\UserController@finished')->name("user.finished");
        Route::resource('user', 'Admin\UserController');

        Route::resource('expert', 'Admin\ExpertController');

        Route::any('out/{outId}/status', 'Admin\OutController@status')->name("out.status");
        Route::any('out/finished', 'Admin\OutController@finished')->name("out.finished");
        Route::resource('out', 'Admin\OutController');

        Route::any('introduction/finished', 'Admin\IntroductionController@finished')->name("introduction.finished");
        Route::resource('introduction', 'Admin\IntroductionController');

        Route::any('mange/finished', 'Admin\ManageController@finished')->name("manage.finished");
        Route::resource('manage', 'Admin\ManageController');
    });

    Route::get('login', 'Admin\LoginController@index')->name('login');
    Route::post('auth', 'Admin\Auth\AuthController@login')->name('auth');
});
