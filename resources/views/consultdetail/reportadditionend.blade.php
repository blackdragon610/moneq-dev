@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <p class="keepTwoLine">「<span><b>保険のことで質問です<b></span>」の追記が完了しました。</p>

                    <section>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                <a class="btnSubmit" href="{{route('post.detail', $postId)}}">追記内容の相談に戻る</a>
                            </div>
                        </div>
                    </section>

            </div>
        </div>

    </div>
</div>

@endsection
