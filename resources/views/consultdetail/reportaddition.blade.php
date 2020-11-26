@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12">
                    <p class="keepTwoLine">「<span><b>{{$post->post_name}}</b></span>」の内容に追記します</p>

                    {{Form::open(['url'=> route('post.report.add.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <input type="hidden" name="post_id", value="{{$post->id}}">
                        <section>
                            <div class="row">
                                <label for="question" class="col-sm-1">質問</label>
                                <label name="question" class="col-sm-11">{{$post->body}}
                                </label>
                            </div>
                        </section>
                        <section>
                            <label for="" >相談の追記</label><span class="text-danger">(必須)</span>
                            @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />
                        </section>
                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <button class="btnSubmit">相談の追記を送信</button>
                                </div>
                            </div>
                        </section>
                    {{Form::close()}}

                </div>
            </div>

        </section>
    </div>
</div>

@endsection
