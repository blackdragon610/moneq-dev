@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium">クレジットカード入力</p>
                <p class="title-14px" style="margin-top:24px">本サービスに関するクレジットカードによる決済業務は、GＭＯペイメントゲートウェイ株式会社に委託しており、</p>
                <p class="title-14px" style="margin-top:24px;line-height:2">
                    本サイトは利用者のクレジットカードに関する一切の情報を保持しません。<br/>
                    〜GMOペイメントゲートウェイ株式会社概要（GMO HPより）〜<br/>
                    GMOペイメントゲートウェイは、東証一部上場企業（証券コード：3769）の総合的な決済関連サービス及び金融関連サービスを展開する会社です。<br/>
                    20年以上にわたり決済サービスをご提供しており、ネットショップなどのオンライン事業者、NHKや定期購入など月額料金課金型の事業者、並びに国税庁・東京都等の公的機関など93,450店舗（GMO-PGグループ 2018年6月末現在）の加盟店に決済サービスをご利用いただいております。 <br/>
                    ご利用内容、クレジットカード情報をご入力いただき、「支払い」ボタンをクリックしてください。確認画面に進みますので、ご入力情報に間違いがなければ、「お支払い」ボタンをクリックしてください。
                </p>
                <ul style="padding-left:10px">
                    <li class="title-14px" style="list-style:initial;margin-left:10px">クレジットカード情報の入力間違いなどにご注意いただき、下記項目を全て入力し「支払い」を押してください</li>
                    <li class="title-14px" style="list-style:initial;margin-left:10px">本人名義以外のカード（家族名義のカード含む）、盗難カード等での不正使用は重大な犯罪です。</li>
                    <li class="title-14px" style="list-style:initial;margin-left:10px">弊社ではデジタルIDを使用したSSL暗号化技術により、カード情報等を暗号化しています。ご安心ください。</li>
                </ul>

                <div style="margin-top:48px;background-image: url('/images/svg/img-background-rect1.svg');
                            background-repeat: no-repeat;background-position: top left; height:60px">
                    <span class="title-16px" style="display:inline-block;color:white;
                                                    padding-top:12px;text-align:center;padding-left:20px">
                        決済プラン
                    </span>
                    <span class="title-bold-19px" style="padding-top:12px;padding-left:30px;">
                        スタンダード会員　3,960円／年
                    </span>
                </div>

                Form::open(['url'=> route('payment.creditcard'),'method'=>'POST', 'files' => false, 'id' => 'form']) 
                    <input type="hidden" name="pay_token" id="pay_token" value="">
                    <input type="hidden" name="member" value="{{$member}}">
                    <input type="hidden" name="sheet" value="{{$sheetId}}">
                    @if(isset($errorStr))
                        <div class="alert alert-danger">{{$errorStr}}</div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <section>
                                <label for="card" class="label-regular">カード番号</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.text', ['name'=>'cardno', 'id'=>'cardno', 'type'=>'text', 'contents' => 'class="form-control textCenter p-0"'])

                                <label for="birthday" class="label-regular">有効期限</label><span class="btn-tag-red">(必須)</span>
                                <div class="row">
                                    <div class="col-6 input-group mt-3 mt-md-0">
                                        @include('layouts.parts.editor.select', ['name' => 'year', 'id'=>'year', "file" => config("funcs.payyears"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"']) 
                                        <h6 class="font-weight-400 pl-2 textCenter" 
                                            style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;">年</h6>
                                    </div>
                                    <div class="col-6 input-group mt-3 mt-md-0">
                                        @include('layouts.parts.editor.select', ['name' => 'month', 'id'=>'month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                        <h6 class="font-weight-400 pl-2"
                                            style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;">月</h6>
                                    </div>
                                </div>

                                <label for="card" class="label-regular">カード名義</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.text', ['name' => 'holdername', 'id'=>'holdername', 'type'=>'text', "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])

                                <label for="cardnumber" class="label-regular">セキュリティコード</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.text', ['name'=>'securitycode', 'id'=>'securitycode', 'type'=>'text', 'contents' => 'class="form-control textCenter p-0" style="width:150px"'])

                            </section>
                        </div>
                    </div>
                    <section>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                <a href="javascript:submitPay();" class="btn yellow-btn-304-50" id="payment-btn-304-50">支払い</a>
                            </div>
                        </div>
                    </section>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>

<script src='https://stg.static.mul-pay.jp/ext/js/token.js'></script>
<script>

    function submitPay(){
        $('#payment').hide();
        var cardno = $('#cardno').val();
        var expire = $('#year').val() + $('#month').val();
        var securitycode = $('#securitycode').val();
        var holdername = $('#holdername').val();
        Multipayment.init( '{{env('GMO_SHOP_ID')}}' );
        Multipayment.getToken(
        {
            cardno:  cardno,
            expire: expire,
            securitycode: securitycode,
            holdername: holdername,
            tokennumber: '1'
        },someCallbackFunction );
    };

    function someCallbackFunction ( response ){
        if( response.resultCode != '000' ){
            window.alert( '購入処理中にエラーが発生しました' )
            $('#payment').show();
        }else{
            //カード情報は念のため値を除去

            // $('#cardno').val('');
            // $('#year').val('')
            // $('#month').val('');
            // $('#securitycode').val('');
            // $('#holdername').val('');
            //予め購入フォームに用意した token フィールドに、値を設定
            $('#pay_token').val(response.tokenObject.token);
            console.log(response.tokenObject.token);
            //スクリプトからフォームを submit
            $('#form').submit();
        }
    };

</script>
@endsection
