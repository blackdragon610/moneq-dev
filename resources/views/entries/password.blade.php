@extends('layouts/front', ["type" => 1])


@section('main')
    {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])<br />
        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])<br />



        <input type="radio" name="pay_status" value="1">無料<br />
        <input type="radio" name="pay_status" value="2">年払会員<br />
        <input type="radio" name="pay_status" value="3">月払会員<br />

        <button>次へ</button>
    {{Form::close()}}
@endsection
