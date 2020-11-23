@extends('layouts/front', ["type" => 1])
@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>
            <div class="row">
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
        </section>

    </div>
</div>

@endsection
