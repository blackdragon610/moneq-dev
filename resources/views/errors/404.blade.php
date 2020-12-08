@extends('layouts/front', ["type" => 1])

@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white input-form-style">
                <p class="title-medium" style="padding-left:70px">エラー</p>

                    <section>
                        <div class="container">
                            <div class="col text-center">
                                <p class="title-16px">このページは存在しません。</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                <a href="{{url('/')}}" class="btn btnSubmit btnUnselected" style="width:300px !important">トップ</a>
                            </div>
                        </div>
                    </section>
            </div>
        </div>

    </div>
</div>
@endsection
