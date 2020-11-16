@extends('layouts/front', ["type" => 1])


@section('main')

    {{Form::open(['url'=> route('auth'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />

    @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワード"'])<br />

    <button>ログイン</button>
    {{Form::close()}}
@endsection
