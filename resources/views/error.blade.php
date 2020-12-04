@extends('layouts/front', ["type" => 1])

@section('main')

<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h5 class="font-weight-bold p-2">閲覧不可</h5>
                    <hr class="mt-2 mb-3"/>
                        <section>
                            <div class="container">
                                <div class="col text-center">
                                    <p>このページは閲覧することができません。</p>
                                    @if(isLogin() == 1)
                                        @if(\Auth::user()->pay_status == 2)
                                            <p>トップボタンをクリックしてトップページに戻る。</p>
                                        @else
                                            <p>閲覧する場合は下記より有料会員にアップデートしてください。</p>
                                        @endif
                                    @else
                                        <p>閲覧する場合は下記より有料会員にアップデートしてください。</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    @if(isLogin() == 1)
                                        @if(\Auth::user()->pay_status == 2)
                                            <a href="{{url('/')}}" class="btnSubmit">トップ</a>
                                        @else
                                            <a href="{{url('payment/1').'/'.\Auth::user()->pay_status}}" class="btnSubmit">有料アップデート</a>
                                        @endif
                                    @else
                                        <a href="{{url('entry')}}" class="btnSubmit">有料アップデート</a>
                                    @endif
                                </div>
                            </div>
                        </section>
                </div>
            </div>

        </section>
    </div>
</div>
@endsection
