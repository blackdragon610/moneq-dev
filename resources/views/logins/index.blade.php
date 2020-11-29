@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid p-3">
    <div class="container">
        <div class="row">
            <p class="col-12 title-medium" style="padding-left:70px !important">ログイン</p>
            <div class="col-6" style="padding-left:70px !important">
                {{Form::open(['url'=> route('auth'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

                    <label class="label-medium" for="email" style="margin-top:32px">メールアドレス</label>

                    @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 
                        'contents' => 'class="form-control" placeholder="メールアドレスを入力" 
                                       style="border: 1px solid #707070; border-radius:0% !important"'])

                    <label class="label-medium" for="password" style="margin-top:24px">パスワード</label>

                    @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 
                        'contents' => 'class="form-control" placeholder="パスワード" 
                                       style="border: 1px solid #707070; border-radius:0% !important"'])
                    <div>
                        <input type="checkbox" id = "auto_login" name = "auto_login">
                        <label class="form-check-label" for="auto_login" 
                                style="font-family: NotoSans-JP-Medium;
                                       font-size: 16px !important;
                                       color:#FF3B00">次回から自動ログイン</label>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="yellow-btn-fluid" 
                                    style="margin-top:24px; height:50px;
                                           font-family: NotoSans-JP-Medium;
                                           font-size: 16px !important;">ログイン</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center" style="margin-top:24px;">
                            <a href="#" style="color:#221815;
                                               font-family: NotoSans-JP-Regular;
                                               font-size: 14px !important;"><u>パスワードをお忘れの方は</u>こちら</a>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
            <div class="col-6" style="padding-right:70px !important">
                <p class="col-12" style="background-color:#EAEAEA; height:36px; padding-top: 6px;
                                         font-family: NotoSans-JP-Medium;
                                         font-size: 16px !important;">ソーシャルアカウントでログイン</p>

                <a href="{{ url('/sns/line/login') }}" class="line btn left-icon-holder">
                    <i class="fa fa-comment fa-2x mr-auto"></i>LINEでログイン
                </a>
                <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn left-icon-holder mt-3">
                    <i class="fa fa-yahoo fa-2x"></i>Yahoo! JAPAN IDでログイン
                </a>
                <a href="{{ url('/sns/facebook/login') }}" class="fb btn left-icon-holder mt-3">
                    <i class="fa fa-facebook fa-2x"></i>Facebookでログイン
                </a>
                <a href="{{ url('/sns/twitter/login')}}" class="twitter left-icon-holder btn mt-2">
                    <i class="fa fa-twitter fa-2x"></i>Twitterでログイン
                </a>
                <a href="{{ url('/sns/google/login') }}" class="google btn left-icon-holder mt-2">
                    <i class="fa fa-google fa-2x"></i>Googleでログイン
                </a>
            </div>
        </div>
    </div>
</div>

<script>

    $('#auto_login').change(function(){
        if( $(this).is(":checked") ){
            $.cookie("auto_login", 1);
        }else{
            $.removeCookie("auto_login");
        }
    });

</script>
@endsection
