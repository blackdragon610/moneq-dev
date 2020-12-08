@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid p-3">
    <div class="container">
        <div class="row">
            <p class="col-12 title-medium" style="padding-left:70px !important">会員登録</p>
            <div class="col-6" style="padding-left:70px !important">
                <p class="col-12 p-0 m-0" style="font-family: NotoSans-JP-Regular;
                                         font-size: 16px !important;
                                         color:#9B9B9B" >ご入力のメールアドレスに会員登録用のURLを送信します。</p>
                {{Form::open(['url'=> route('auth'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

                    <label class="title-16px" for="email" style="margin-top:32px">メールアドレス</label>

                    @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 
                        'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])

                    @if ($mode == "monitor")
                    <label class="title-16px" for="password" style="margin-top:24px">SMS</label>
                    @include('layouts.parts.editor.text', ["type" => "tel", 'name' => 'tel', 
                        'contents' => 'class="form-control" placeholder="電話番号を入力"'])
                    @endif                                       
                    <div>
                        <input type="checkbox" id = "auto_login" name = "auto_login">
                        <label class="form-check-label" for="auto_login" 
                                style="font-family: NotoSans-JP-Medium;
                                       font-size: 16px !important;
                                       color:#FF3B00">利用規約に同意して登録する</label>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="yellow-btn-fluid" 
                                    style="margin-top:24px; height:50px;
                                           font-family: NotoSans-JP-Medium;
                                           font-size: 16px !important;">送信する</button>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
            <div class="col-6" style="padding-right:70px !important">
                <p class="col-12" style="background-color:#EAEAEA; height:36px; padding-top: 6px;
                                         font-family: NotoSans-JP-Medium;
                                         font-size: 16px !important;">ソーシャルアカウントでログイン</p>

                <p class="col-12 p-0 m-0" style="font-family: NotoSans-JP-Regular;
                                         font-size: 16px !important;
                                         color:#9B9B9B" >お持ちのソーシャルアカウントでも会員登録が可能です。</p>                                         
                                         
                <p class="col-12 p-0 m-0" style="font-family: NotoSans-JP-Regular;
                                         font-size: 16px !important;
                                         color:#221815">
                    <span style="color:#FF3B00"><u>利用規約</u></span>に同意して登録する</p>                                         

                <a href="{{ url('/sns/line/login') }}" class="line btn left-icon-holder">
                    <img src="/images/svg/image-button-line.svg">LINEで登録
                </a>
                <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn left-icon-holder mt-3">
                    <img src="/images/svg/image-button-yahoo.svg">Yahoo! JAPAN IDで登録
                </a>
                <a href="{{ url('/sns/facebook/login') }}" class="fb btn left-icon-holder mt-3">
                    <img src="/images/svg/image-button-facebook.svg">Facebookで登録
                </a>
                <a href="{{ url('/sns/twitter/login')}}" class="twitter left-icon-holder btn mt-2">
                    <img src="/images/svg/image-button-twitter.svg">Twitterで登録
                </a>
                <a href="{{ url('/sns/google/login') }}" class="google btn left-icon-holder mt-2">
                    <img src="/images/svg/image-button-google.svg">Googleで登録
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
