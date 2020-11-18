@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 bg-white">
                {{Form::open(['url'=> route('auth'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    
                    <label for="email">メールアドレス</label>
                    
                    @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />

                    <label for="password">パスワード</label>

                    @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワード"'])<br />
                    <div class="m-2">
                        <input type="checkbox" id = "auto_token" name = "auto_token">
                        <label class="form-check-label" for="auto-token">次回から自動ログイン</label>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="bg-dark text-white p-3 pl-5 pr-5">ログイン</button>
                        </div>
                    </div>
                    <div class="m-2">
                        <a href="#" class="text-dark"><u>パスワードを忘れた方</u></a>
                    </div>
                {{Form::close()}}
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <a href="{{ url('/sns/line/login') }}" class="line btn mt-3">
                    <i class="fa fa-line fa-fw"></i>Lineでログイン
                </a>
                <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn mt-3">
                    <i class="fa fa-yahoo fa-fw"></i>Yahoo! JAPAN IDでログイン
                </a>
                <a href="{{ url('/sns/facebook/login') }}" class="fb btn mt-2">
                    <i class="fa fa-facebook fa-fw"></i>Facebook
                </a>
                <a href="{{ url('/sns/twitter/login')}}" class="twitter btn mt-2">
                    <i class="fa fa-twitter fa-fw"></i>Twitter
                </a>
                <a href="{{ url('/sns/google/login') }}" class="google btn mt-2">
                    <i class="fa fa-google fa-fw"></i>Google+
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
