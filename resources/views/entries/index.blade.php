@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 col-12 bg-white">
                <section>
                    <h5 class="font-weight-bold p-2">会員登録</h5>
                    <hr class="mt-2 mb-3"/>

                    {{Form::open(['url'=> route('entry.send'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <input type="hidden" name="mode" value="{{$mode}}"/>

                        <p>ご入力のメールアドレスに会員登録用のURLを送信します。</p>
                        <label for="email">メールアドレス</label>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />

                        @if ($mode == "monitor")
                            <label for="sms">SMS</label>
                            @include('layouts.parts.editor.text', ["type" => "tel", 'name' => 'tel', 'contents' => 'class="form-control" placeholder="電話番号"'])<br />
                        @endif
                        <div class="m-2">
                            <a href="#" class="text-dark"><u>パスワードを忘れた方</u></a>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <p><u>利用規約</u>に同意して登録する</p>
                                <button class="btnSubmit">送信する</button>
                            </div>
                        </div>
                    {{Form::close()}}
                </section>

                <section>
                    <h5 class="font-weight-bold p-2">ソーシャルアカウントで登録</h5>
                    <hr class="mt-2 mb-3"/>
                    <p>お持ちのソーシャルアカウントで会員登録が可能です。 利用規約に同意して登録する。</p>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <a href="{{ url('/sns/line/login') }}" class="line btn mt-2">
                                    <i class="fa fa-line fa-fw"></i>Lineでログイン
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="{{ url('/sns/yahoojp/login') }}" class="yahoo btn mt-2">
                                    <i class="fa fa-yahoo fa-fw"></i>Yahoo! JAPAN IDでログイン
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="{{ url('/sns/facebook/login') }}" class="fb btn mt-2">
                                    <i class="fa fa-facebook fa-fw"></i>Facebook
                                </a>
                            </div>
                        </div>
                        <div class="row ">
                            <!-- <div class="col text-center"> -->
                                <div class="col-md-4 offset-md-2">
                                    <a href="{{ url('/sns/twitter/login')}}" class="twitter btn mt-2">
                                        <i class="fa fa-twitter fa-fw"></i>Twitter
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ url('/sns/google/login') }}" class="google btn mt-2">
                                        <i class="fa fa-google fa-fw"></i>Google+
                                    </a>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
