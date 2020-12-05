@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row">
            <!-- right sticky sidebar -->
            <div class="col-12 col-sm-3 order-sm-2" id="sticky">
                <!-- <section> -->
                @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => ''])
                <!-- </section> -->
            </div>

            <div class="col-12 col-sm-9 order-sm-1 pl-0" id="main">
                <p class="keepTwoLine">「<span><b>{{$post->post_name}}<b></span>」が不適切な相談だと思う場合は、その理由をご記入のうえ、送信ください。
                なお、対応結果やその理由につきましてはご返答いたしかねますので予めご了承いただければ幸いです。</p>

                {{Form::open(['url'=> route('post.report.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <input type="hidden" name="post_id", value="{{$post->id}}">
                    <section>
                        <label for="" >通報内容</label><span class="text-danger">(必須)</span>
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

    </div>
</div>

@endsection
