@extends('layouts/front', ["type" => 1])


@section('main')

    {{Form::open(['url'=> route('entry.send'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
        <input type="hidden" name="mode" value="{{$mode}}"/>



        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />

        @if ($mode == "monitor")
            @include('layouts.parts.editor.text', ["type" => "tel", 'name' => 'tel', 'contents' => 'class="form-control" placeholder="電話番号"'])<br />
        @endif

        <button>送信する</button>
    {{Form::close()}}
@endsection
