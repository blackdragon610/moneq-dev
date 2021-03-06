@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

    {{Form::open(['url'=> route('entry.expert.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    <div class="row">
        <div class="col-md-12 col-lg-12 bg-white">
            <h5 class="font-weight-bold p-2">パスワードの入力</h5>
            <hr class="mt-2 mb-3"/>

            <label for="password">パスワード<span class="text-danger">必須</span></label>
            @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])<br />

            <label for="password_conform">パスワード(確認用)<span class="text-danger">必須</span></label>
            @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])<br />

        </div>    
    </div>
    <div class="row mt-4">
        <div class="col text-center">
            <button class="btnSubmit">次へ</button>
        </div>
    </div>
    {{Form::close()}}

    </div>
</div>
@endsection
