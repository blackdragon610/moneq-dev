@extends('layouts/front', ["type" => 1])


@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">会員ステータス</h5>
                    <hr class="mt-2 mb-3"/>
                    <p>課金を停止させたため、無料会員になりました。</p>

                    <section class="col text-center">
                    <a class="btnUnselected" href="{{route('profiles.manage')}}">会員情報に戻る</a>
                    </section>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
