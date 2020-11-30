@extends('layouts/front', ["type" => 1])

@section('main')
<div class="whitepanel">
    <div class="container">

        <?php 
            $email['メールアドレス'] = "test@test.jp";
            $password['パスワード'] = "321";
            $profile['ニックネーム'] = "テスト太郎";
            $profile['性別'] = "男性";
            $notification['回答通知'] = "オン";
            $notification['メッセージ通知'] = "オン";
            $membership['有料プラン(年間払い)'] = "membership";
            $payment['ニックネーム'] = "テスト太郎";
            $payment['性別'] = "男性";
        ?>
        
        <div class="row" style="margin-top:80px; margin-bottom:80px" >
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ['url' => 'manage/email', 'name' => 'メールアドレス', 'contents' => $email])
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ["url" => "manage/password", 'name' => 'パスワード', 'contents' => $password])
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ["url" => "manage/profile", 'name' => 'プロフィール', 'contents' => $profile])
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ["url" => "manage/notification", 'name' => '通知設定', 'align' =>'text-right font-weight-bold', 'contents' => $notification])
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ["url" => "manage/membership", 'name' => '会員ステータス', 'contents' => $membership])
            </div>
            @if($payment != '')
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                @include('layouts.parts.custom.profilecard', ["url" => "manage/payment", 'name' => '決済情報', 'contents' => $payment])
            </div>
            @endif
        </div>

    </div>
</div>

@endsection
