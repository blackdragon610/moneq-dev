@extends('layouts/front', ["type" => 1])

@section('main')
<div class="whitepanel">
    <div class="container">
        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/profile/manage')}}" style="color:#9B9B9B">会員情報</a>
                </li>
            </ol>
        </div>

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


@if($passChange == 1)
    <button type="button" id='notify' class="btn btn-alert-blue">
        <image src="/images/svg/image-fa-checkbox.svg">
        パスワードが変更されました。
        <span class="fa fa-close"></span>
    </button>
@endif

@if($emailChange == 1)
    <button type="button" id='notify' class="btn btn-alert-blue">
        <image src="/images/svg/image-fa-checkbox.svg">
        メッセージが送信されました。
        <span class="fa fa-close"></span>
    </button>
@endif
@if($profileChange == 1)

    <button type="button" id='notify' class="btn btn-alert-blue">
        <image src="/images/svg/image-fa-checkbox.svg">
        プロフィールが変更されました。
        <span class="fa fa-close"></span>
    </button>
@endif

@if($notifyChange == 1)
    <button type="button" id='notify' class="btn btn-alert-blue">
        <image src="/images/svg/image-fa-checkbox.svg">
        通知設定が変更されました。
        <span class="fa fa-close"></span>
    </button>
@endif

<script>
    $('.fa').click(function(){
        $('#notify').hide();
    })
</script>

@endsection
