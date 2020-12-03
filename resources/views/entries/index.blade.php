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
                        'contents' => 'class="form-control" placeholder="メールアドレスを入力" 
                                       style="border: 1px solid #707070; border-radius:0% !important"'])

                    @if ($mode == "monitor")
                    <label class="title-16px" for="password" style="margin-top:24px">SMS</label>
                    @include('layouts.parts.editor.text', ["type" => "tel", 'name' => 'tel', 
                        'contents' => 'class="form-control" placeholder="電話番号を入力" 
                                       style="border: 1px solid #707070; border-radius:0% !important"'])
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
                    <i class="fa fa-comment fa-2x mr-auto"></i>LINEで登録
                </a>
                <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn left-icon-holder mt-3">
                    <i class="fa fa-yahoo fa-2x"></i>Yahoo! JAPAN IDで登録
                </a>
                <a href="{{ url('/sns/facebook/login') }}" class="fb btn left-icon-holder mt-3">
                    <i class="fa fa-facebook fa-2x"></i>Facebookで登録
                </a>
                <a href="{{ url('/sns/twitter/login')}}" class="twitter left-icon-holder btn mt-2">
                    <i class="fa fa-twitter fa-2x"></i>Twitterで登録
                </a>
                <a href="{{ url('/sns/google/login') }}" class="google btn left-icon-holder mt-2">
                    <i class="fa fa-google fa-2x"></i>Googleで登録
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
