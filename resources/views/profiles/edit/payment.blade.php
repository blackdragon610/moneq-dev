@extends('layouts/front', ["type" => 1])


@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">         
                    <h5 class="font-weight-bold p-2">課金の停止</h5>
                    <hr class="mt-2 mb-3"/>
                    <p>課金を停止させたため、無料会員になりました。</p>

                    <div class="row mt-4">
                        <div class="col text-center">
                            <button class="btnUnselected">会員情報に戻る</button>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>
</div>


@endsection
