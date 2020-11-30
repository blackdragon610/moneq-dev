@extends('layouts/front', ["type" => 1])


@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">会員ステータス</h5>
                    <hr class="mt-2 mb-3"/>
                    <p>現在のプランは月払会員</p>

                    <section>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pl-0 pr-0 pr-md-2">
                                <article class="bg-white col-12">
                                    <h5 class="font-weight-bold mb-2">年払会員 (3,980円/年)</h5>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>️️月最大3回お金の専門家に相談が可能</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                                    @if($user->pay_status != 2)
                                        <div class="col text-center btnLayer">
                                            <a href="{{url('payments/input/1/2')}}" class="btnUnselected" id="btnPlan1">選択する</a>
                                        </div>
                                    @endif
                                </article>
                            </div>

                            <div class="col-sm-12 col-md-6 pl-0 pr-0 pl-md-2 mt-4 mt-md-0">
                                <article class="bg-white col-12">
                                    <h5 class="font-weight-bold mb-2">月払会員 (330円/月)</h5>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>月最大1回お金の専門家に相談が可能</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                                    @if($user->pay_status == 1)
                                        <div class="col text-center btnLayer">
                                            <a href="{{url('payments/input/1/3')}}" class="btnUnselected" id="btnPlan2">選択する</a>
                                        </div>
                                    @endif
                                </article>
                            </div>
                    </section>
                    <hr class="mt-2 mb-3"/>
                    <p class="font-weight-bold">課金停止</p>
                    <p>1下のボタンより現在の料金プランの停止手続きをしてください。</p>
                    <p>2.料金プラン停止手続き完了後、新しい料金プランの選択画面に移ります。</p>
                    <p></p>
                    <p>無料会員への変更は即時対応します。残っている質問は引き続き今月中は使用できます。</p>
                    <p>変更のキャンセルはできませんので、予めご了承ください。</p>
                    @if($user->pay_status != 1)
                        <a href="{{route('profiles.membership.payment.delete')}}" class="text-dark">課金停止</a>
                    @endif
                    <p></p>
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
