@extends('layouts/front', ["type" => 1])
@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>
            <?php
                $email = array('test@test.jp'=> '', ''=>'');
                $password = array('**************' => '', ''=>'');
                $profile = array('ニックネーム' => 'テスト太郎', '性別' => '男性');
                $notification = array('回答通知' => 'オン', 'メッセージ通知' => 'オン', 'MoneQからの通知' => 'オフ');
                $membership = array('有料プラン(年間払い)' => '', ''=>'');
                $payment = array('クレジットカード' => '', ''=>'');
            ?>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ['url' => '/entry', 'name' => 'メールアドレス', 'contents' => $email])
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ["url" => "", 'name' => 'パスワード', 'contents' => $password])
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ["url" => "", 'name' => 'プロフィール', 'contents' => $profile])
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ["url" => "", 'name' => '通知設定', 'align' =>'text-right font-weight-bold', 'contents' => $notification])
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ["url" => "", 'name' => '会員ステータス', 'contents' => $membership])
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    @include('layouts.parts.custom.profilecard', ["url" => "", 'name' => '決済情報', 'contents' => $payment])
                </div>
            </div>
            
        </section>

    </div>
</div>

@endsection
