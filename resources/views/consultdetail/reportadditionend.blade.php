@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p class="keepTwoLine">「<span><b>保険のことで質問です<b></span>」の追記が完了しました。</p>

                    {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <button class="btnSubmit">追記内容の相談に戻る</button>
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