@extends('layouts/front', ["type" => 1])


@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white">
                <p class="title-medium" style="padding-left:70px">仮登録完了</p>

                <section>
                    <div class="container">
                        <div class="col text-center">
                            <p class="title-16px">メールを送信しました。</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center btnLayer">
                            <a href="{{url('/')}}" class="btn btnSubmit btnUnselected">トップ</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>
@endsection
