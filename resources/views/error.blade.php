@extends('layouts/front', ["type" => 1])

@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white">
                <p class="title-medium" style="padding-left:70px">閲覧不可</p>

                    <section>
                        <div class="container">
                            <div class="col text-center">
                                <p class="title-16px">このページは閲覧することができません。</p>
                                @if(isLogin() == 1)
                                    @if(\Auth::user()->pay_status == 2)
                                        <p class="title-16px">トップボタンをクリックしてトップページに戻る。</p>
                                    @else
                                        <p class="title-16px">閲覧する場合は下記より有料会員にアップデートしてください。</p>
                                    @endif
                                @else
                                    <p class="title-16px">閲覧する場合は下記より有料会員にアップデートしてください。</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                @if(isLogin() == 1)
                                    @if(\Auth::user()->pay_status == 2)
                                        <a href="{{url('/')}}" class="btnSubmit btnUnselected">トップ</a>
                                    @else
                                        <a href="{{url('payment/1').'/'.\Auth::user()->pay_status}}" class="btnSubmit btnUnselected">有料アップデート</a>
                                    @endif
                                @else
                                    <a href="{{url('entry')}}" class="btnSubmit btnUnselected">有料アップデート</a>
                                @endif
                            </div>
                        </div>
                    </section>
            </div>
        </div>

    </div>
</div>
@endsection
