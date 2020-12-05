@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container ">

    {{-- {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}} --}}
    <input type="hidden" id="sheet" value="{{$sheetId}}">

    <div class="row" style="margin-bottom:80px">
        <div class="col-12 bg-white">

            <div>
                <div class="row" style="margin-top:70px;padding-left:70px;padding-right:70px">

                    <div class="col-12 col-sm-6">
                        <article class="col-12 p-0" style="background-color:#FFF9F2; max-width:488px; min-height:402px">
                            <p class="title-small text-center">年払会員 (3,980円/年)</p>
                            <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大<span class="title-16px-red">3回</span>お金の専門家に相談が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                            <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                @if($sheetId == 1)
                                    @if($member != 3)
                                        <a href="#" class="btn yellow-btn-304-50" id="btnPlan1">選択中</a>
                                        <input type="hidden" name="member" id="member" value="2">
                                    @else
                                        <a href="#" class="btn white-btn-304-50" id="btnPlan1">選択する</a>
                                    @endif
                                @elseif($sheetId == 2)
                                    @if($member == 2)
                                        <a href="#" class="btn yellow-btn-304-50" id="btnPlan1">選択中</a>
                                            <input type="hidden" name="member" id="member" value="2">
                                    @else
                                        <a href="#" class="btn white-btn-304-50" id="btnPlan1">選択する</a>
                                    @endif
                                @endif
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6">
                        <article class="col-12 p-0" style="background-color:#F5F5F5; max-width:488px; min-height:402px">
                            <p class="title-small text-center">月払会員 (330円/月)</p>
                            <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大<span class="title-16px-red">1回</span>お金の専門家に相談が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>
                            <div class="col text-center btnLayer">
                                @if($sheetId == 1)
                                    @if($member == 3)
                                        <a href="#" class="btn white-btn-304-50" id="btnPlan2">選択中</a>
                                        <input type="hidden" name="member" id="member" value="3">
                                    @elseif($member == 1)
                                        <a href="#" class="btn white-btn-304-50" id="btnPlan2">選択する</a>
                                    @endif
                                @elseif($sheetId == 2)
                                    @if($member == 3)
                                            <input type="hidden" name="member" id="member" value="3">
                                            <a href="#" class="btn white-btn-304-50" id="btnPlan2">選択中</a>
                                    @else
                                        <a href="#" class="btn white-btn-304-50" id="btnPlan2">選択する</a>
                                    @endif
                                @endif
                            </div>
                        </article>
                    </div>


                </div>
            </div>

            <div style="padding-left:70px;">
                <article class="bg-white col-12">
                    <p class="title-medium">クレジットカード</p>
                    <p class="title-16px" style="margin-top:32px">ご利用可能なクレジットカード</p>
                    <p class="title-14px" style="margin-top:15px">VISA／Mastercard／JCB／AMEX／Diners／Orico／CF／JACCS／Life／eLIO</p>
                    <div class="row">
                        <div class="col">
                            <img src="/images/svg/img-payment-jcb.svg">
                            <img src="/images/svg/img-payment-mastercard.svg">
                            <img src="/images/svg/img-payment-visa.svg">
                            <img src="/images/svg/img-payment-americanexpress.svg">
                            <img src="/images/svg/img-payment-dinersclub.svg">
                            <img src="/images/svg/img-payment-discover.svg">
                        </div>
                        <div class="col text-center">
                            @if($sheetId == 1)
                                @if($member == 1)   <?php $member = 2?> @endif
                                <a class="btn yellow-btn-304-50" href="{{url('payments/input/1').'/'.$member}}" id="cardBtn">クレジット決済を押す</a>
                            @elseif($sheetId == 2)
                            @if($member == 1)   <?php $member = 2?> @endif
                                <a class="btn yellow-btn-304-50" href="{{url('payments/input/2').'/'.$member}}" id="cardBtn">クレジット決済を押す</a>
                            @endif
                        </div>
                    </div>

                    <p class="title-medium">キャリア決済</p>
                    <div class="row" style="margin-top:32px">
                        <fieldset style="width:220px;height:130px;text-align:center;border:1px dashed #707070;margin-right:24px">
                            <legend style="width:40%">
                                <a id="car1" href="{{url('paymenta/au').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-payment-au-btn.svg"></a>
                            </legend>
                            <p class="title-12px">auかんたん決済</p>
                        </fieldset>
                        <fieldset style="width:220px;height:130px;text-align:center;border:1px dashed #707070;margin-right:24px">
                            <legend style="width:40%">
                                <a id="car2" href="{{url('paymenta/docomo').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-payment-docomo-btn.svg"></a>
                            </legend>
                            <p class="title-12px">ドコモ払い</p>
                        </fieldset>
                        <fieldset style="width:220px;height:130px;text-align:center;border:1px dashed #707070;margin-right:24px">
                            <legend style="width:40%">
                                <a id="car3" href="{{url('paymenta/softbank').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-payment-softbank-btn.svg"></a>
                            </legend>
                            <p class="title-12px">ソフトバンクまとめで支払い</p>
                        </fieldset>
                    </div>
                    </article>
            </div>

        </div>
    </div>

    {{-- {{Form::close()}} --}}

    </div>
</div>

<script>
    $('#btnPlan1').click(function(e) {
        $('#btnPlan1').addClass('btnSelected').removeClass('btnUnselected');
        $('#btnPlan2').addClass('btnUnselected').removeClass('btnSelected');
        $('#btnPlan1').html('選択中');
        $('#btnPlan2').html('選択する');
        var sheet = $('#sheet').val();
        $('#cardBtn').attr("href", "{{url('payments/input')}}" + '/' + sheet + '/2');
        $('#car1').attr("href", "{{url('paymenta/au')}}" + '/' + sheet + '/' +'2');
        $('#car2').attr("href", "{{url('paymenta/docomo')}}" + '/' + sheet + '/' +'2');
        $('#car3').attr("href", "{{url('paymenta/softbank')}}" + '/' + sheet + '/' +'2');
    });

    $('#btnPlan2').click(function(e) {
        $('#btnPlan2').addClass('btnSelected').removeClass('btnUnselected');
        $('#btnPlan1').addClass('btnUnselected').removeClass('btnSelected');
        $('#btnPlan2').html('選択中');
        $('#btnPlan1').html('選択する');
        var sheet = $('#sheet').val();
        $('#cardBtn').attr("href", "{{url('payments/input')}}" + '/' + sheet + '/3');
        $('#car1').attr("href", "{{url('paymenta/au')}}" + '/' + sheet + '/' +'3');
        $('#car2').attr("href", "{{url('paymenta/docomo')}}" + '/' + sheet + '/' +'3');
        $('#car3').attr("href", "{{url('paymenta/softbank')}}" + '/' + sheet + '/' +'3');
    });

</script>
@endsection
