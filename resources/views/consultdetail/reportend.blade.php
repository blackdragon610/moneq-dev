@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p class="keepTwoLine">「<span><b>保険のことで質問です</b></span>」の通報が完了しました。</p>

                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <a class="btnSubmit" href="{{url('/')}}">追記内容の相談に戻る</a>
                                </div>
                            </div>
                        </section>

                </div>
            </div>

        </section>
    </div>
</div>

@endsection
