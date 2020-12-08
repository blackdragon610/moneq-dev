@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="title-16px" style="margin-top:72px"><span class="title-24px-red">「<b>{{$post->post_name}}</b>」</span>の内容に追記します</p>

                {{Form::open(['url'=> route('post.report.add.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <input type="hidden" name="post_id", value="{{$post->id}}">

                    <span for="question" class="col-sm-1 label-regular">質問</span>
                    <span name="question" class="col-sm-11 label-regular">{{$post->body}}</span>
                    <br/>

                    <label for="" class="label-regular" style='margin-left:15px'>相談の追記</label>
                    @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />

                    <div class="text-center btnLayer">
                        <button class="yellow-btn-304-50" style="max-width: 300px;">相談の追記を送信</button>
                    </div>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>

@endsection
