@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 col-lg-12 bg-white">
                <h5 class="font-weight-bold p-2">会員登録</h5>
                <hr class="mt-2 mb-3"/>
                {{Form::open(['url'=> route('auth'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    
                    <p>ご入力のメールアドレスに会員登録用のURLを送信します。</p>

                    <label for="email">メールアドレス</label>
                    
                    @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />

                    <label for="sms">SMS</label>

                    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'sms', 'contents' => 'class="form-control" placeholder="電話番号を入力"'])<br />

                    <div class="row">
                        <div class="col text-center">
                            <p><u>利用規約</u>に同意して登録する</p>
                            <button class="btnSubmit">送信する</button>
                        </div>
                    </div>
                    <div class="m-2">
                        <a href="#" class="text-dark"><u>パスワードを忘れた方</u></a>
                    </div>
                {{Form::close()}}

                <h5 class="font-weight-bold p-2">ソーシャルアカウントで登録</h5>
                <hr class="mt-2 mb-3"/>
                <p>お持ちのソーシャルアカウントで会員登録が可能です。 利用規約に同意して登録する。</p>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ url('/sns/line/login') }}" class="line btn col-md-5 col-lg-3 m-2">
                                <img src="/images/svg/image-button-line.svg">Lineでログイン
                            </a>
                            <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn col-md-5 col-lg-3 m-2">
                                <img src="/images/svg/image-button-yahoo.svg">Yahoo! JAPAN IDでログイン
                            </a>
                            <a href="{{ url('/sns/facebook/login') }}" class="fb btn col-md-5 col-lg-3 m-2">
                                <img src="/images/svg/image-button-facebook.svg">Facebook
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ url('/sns/twitter/login')}}" class="twitter btn col-md-5 col-lg-3 m-2">
                                <img src="/images/svg/image-button-twitter.svg">Twitter
                            </a>
                            <a href="{{ url('/sns/google/login') }}" class="google btn col-md-5 col-lg-3 m-2">
                                <img src="/images/svg/image-button-google.svg">Google+
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
