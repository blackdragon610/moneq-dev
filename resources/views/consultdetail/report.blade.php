@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p class="keepTwoLine">「<span><b>保険のことで質問です<b></span>」が不適切な相談だと思う場合は、その理由をご記入のうえ、送信ください。
                    なお、対応結果やその理由につきましてはご返答いたしかねますので予めご了承いただければ幸いです。</p>

                    {{Form::open(['url'=> route('post.report.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <input type="hidden" name="post_id", value="{{$postId}}">
                        <section>
                            <label for="" >相談内容</label><span class="text-danger">(必須)</span>
                            @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />
                        </section>
                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <button class="btnSubmit">通報を送信</button>
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
