@extends('layouts/front', ["type" => 1])


@section('main')

    {{Form::open(['url'=> route('post.store'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name',  'contents' => 'placeholder="例：お金のことで相談がある"'])<br />
    <br />

    @include('layouts.parts.editor.select', ['name' => 'sub_category_id',  "file" => $categories, "keyValue" => "", "contents" => ""])<br />

    @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />


    @if (!empty($isConfirmation))
        {!! Form::submit('修正', ['class' => 'btn btn-block btn-default', 'name' => 'reInput']) !!}
        {!! Form::submit('確定', ['class' => 'btn btn-block btn-primary', 'name' => 'end']) !!}
    @else
        <button class="btnSubmit">一時保存</button>
        <button class="btnSubmit">相談を投稿</button>
    @endif

    {{Form::close()}}
@endsection
