@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container ">

    <div class="row" style="margin-bottom:80px">
        <div class="col-12 bg-white">
            
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
</div>

@endsection
