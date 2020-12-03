@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium" style="padding-left:70px">会員ステータス</p>
                <!-- <hr class="mt-2 mb-3"/> -->
                <!-- <p>現在のプランは月払会員</p> -->
                <div>
                    <div class="row" style="padding-left:70px;padding-right:70px">
                        <div class="col-12 col-sm-6">
                            <article class="col-12 p-0" style="background-color:#FFF9F2; max-width:488px; max-height:402px">
                                <p class="title-small text-center">年払会員 (3,980円/年)</p>
                                <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大3回お金の専門家に相談が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                                <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                    <a href="#" class="btn yellow-btn-304-50" id="btnPlan1">選択中</a>
                                </div>
                            </article>
                        </div>

                        <div class="col-12 col-sm-6">
                            <article class="col-12 p-0" style="background-color:#F5F5F5; max-width:488px; max-height:402px">
                                <p class="title-small text-center">月払会員 (330円/月)</p>
                                <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大1回お金の専門家に相談が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                                <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                                <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                    <a href="#" class="btn white-btn-304-50" id="btnPlan2">選択する</a>
                                </div>
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
                    <p style="margin-top:24px">
                        <a href="{{route('profiles.membership.payment.delete')}}" class="text-dark title-16px" style="margin-top:24px"><u>課金停止</u></a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
$('#btnPlan1').click(function(e) {
    $('#btnPlan1').addClass('yellow-btn-304-50').removeClass('white-btn-304-50');
    $('#btnPlan2').addClass('white-btn-304-50').removeClass('yellow-btn-304-50');
    $('#btnPlan1').html('選択中');
    $('#btnPlan2').html('選択する');
});

$('#btnPlan2').click(function(e) {
    $('#btnPlan2').addClass('yellow-btn-304-50').removeClass('white-btn-304-50');
    $('#btnPlan1').addClass('white-btn-304-50').removeClass('yellow-btn-304-50');
    $('#btnPlan2').html('選択中');
    $('#btnPlan1').html('選択する');
});


</script>

@endsection
