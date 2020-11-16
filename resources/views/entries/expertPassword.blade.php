@extends('layouts/front', ["type" => 1])


@section('main')
    {{Form::open(['url'=> route('entry.expert.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])<br />
        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])<br />


        <button>次へ</button>
    {{Form::close()}}
@endsection
