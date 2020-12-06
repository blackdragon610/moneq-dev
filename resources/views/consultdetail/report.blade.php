@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row">
            <!-- right sticky sidebar -->
            <div class="col-12 col-sm-3 order-sm-2" id="sticky" style="min-width:300px">
                <section>
                    @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'weekExperts' => $weekExperts,
                                                   'monthExperts' => $monthExperts, 'totalExperts'=> $totalExperts])
                </section>
            </div>

            <div class="col-12 col-sm-9 order-sm-1 p-2" id="main" style="max-width:800px">
                <p class="label-16px p-4 mt-5 add-post">
                <span class="label-24px-red">「{{$post->post_name}}」</span>が不適切な相談だと思う場合は、その理由をご記入のうえ、送信ください。
                なお、対応結果やその理由につきましてはご返答いたしかねますので予めご了承いただければ幸いです。</p>

                {{Form::open(['url'=> route('post.report.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <input type="hidden" name="post_id", value="{{$post->id}}">
                    <section>
                        <label class="label-regular">通報内容</label><span class="btn-tag-red">(必須)</span>
                        @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])
                    </section>
                    <section>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                <button class="btnSubmit yellow-btn-304-50">通報する</button>
                            </div>
                        </div>
                    </section>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>

@endsection
