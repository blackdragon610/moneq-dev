@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/profile/manage')}}" style="color:#9B9B9B">会員情報</a>
                </li>
                <li class="breadcrumb-item">会員ステータス</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white">
                <p class="title-medium" style="padding-left:70px">会員ステータス</p>
                <!-- <hr class="mt-2 mb-3"/> -->
                <!-- <p>現在のプランは月払会員</p> -->
                @if($user->pay_status == 1)
                    <p class="label-16px" style="padding-left:70px">現在のプランは無料会員</p>
                @elseif($user->pay_status == 2)
                    <p class="label-16px" style="padding-left:70px">現在のプランは年払会員</p>
                @else
                    <p class="label-16px" style="padding-left:70px">現在のプランは月払会員</p>
                @endif

                <div>
                    <div class="row" style="padding-left:70px;padding-right:70px">
                        <div class="col-12 col-sm-6">
                            <article class="col-12 p-0" style="background-color:#FFF9F2; max-width:488px; max-height:402px">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon">おすすめ</div>
                                </div>

                                <p class="title-small text-center">年払会員 (3,980円/年)</p>
                                <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大<span class="title-16px-red">3回</span>お金の専門家に相談が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                                @if($user->pay_status != 2)
                                    <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                        <a id="membershipbtn" href="{{url('payment/1/2')}}" class="btn white-btn-304-50" id="btnPlan1">選択する</a>
                                    </div>
                                @else
                                    <div class="col text-center" style="margin-top:48px;margin-bottom:48px;height:50px">
                                    </div>
                                @endif
                            </article>
                        </div>

                        <div class="col-12 col-sm-6">
                            <article class="col-12 p-0" style="background-color:#F5F5F5; max-width:488px; max-height:402px">
                                <p class="title-small text-center">月払会員 (330円/月)</p>
                                <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大<span class="title-16px-red">1回</span>お金の専門家に相談が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                                @if($user->pay_status == 1)
                                    <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                        <a id="membershipbtn" href="{{url('payment/1/3')}}" class="btn white-btn-304-50" id="btnPlan2">選択する</a>
                                    </div>
                                @else
                                    <div class="col text-center" style="margin-top:48px;margin-bottom:48px;height:50px">
                                    </div>
                                @endif
                            </article>
                        </div>
                    </div>
                </div>
                <div style="padding-left:70px;margin-top:52px">
                    <p class="title-21px">課金停止</p>
                    <ol>
                        <li class="label-16px" style="margin-top: 10px;">下のボタンより現在の料金プランの停止手続きをしてください。</li>
                        <li class="label-16px" style="margin-top: 10px;">料金プラン停止手続き完了後、新しい料金プランの選択画面に移ります。</li>
                    </ol>
                    <p class="label-16px" style="margin-top:24px;color:#777777">無料会員への変更は即時対応します。残っている質問は引き続き今月中は使用できます。</p>
                    <p class="label-16px" style="color:#777777">変更のキャンセルはできませんので、予めご了承ください。</p>
                    @if($user->pay_status != 1)
                        <p style="margin-top:24px">
                            <a href="{{route('profiles.membership.payment.delete')}}" class="text-dark title-16px" style="margin-top:24px"><u>課金停止</u></a>
                        </p>
                    @endif


                </div>
            </div>
        </div>

    </div>
</div>

@endsection
