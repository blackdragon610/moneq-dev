@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">クレジットカード入力</h5>
                    <hr class="mt-2 mb-3"/>

                    <p>本サービスに関するクレジットカードによる決済業務は、<a href="#">GＭＯペイメントゲートウェイ株式会社</a>に委託しており、</p>

                    {{Form::open(['url'=> route('payment.creditcard'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <input type="hidden" name="pay_token" id="pay_token" value="">
                        <input type="hidden" name="member" value="{{$member}}">
                        <input type="hidden" name="sheet" value="{{$sheetId}}">
                        @if(isset($errorStr))
                            <div class="alert alert-danger">{{$errorStr}}</div>
                        @endif
                        <section>
                            <label for="card" class="font-weight-bold">カード番号</label>
                            @include('layouts.parts.editor.text', ['name'=>'cardno', 'id'=>'cardno', 'type'=>'text', 'contents' => 'class="form-control textCenter p-0"'])
                        </section>
                        <section>
                            <div class="col-6">
                                <label for="birthday" class="font-weight-bold">有効期限</label><br />
                                <div class="col-6 input-group mt-3 mt-md-0">
                                    @include('layouts.parts.editor.select', ['name' => 'year', 'id'=>'year', "file" => config("funcs.payyears"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                    <h6 class="font-weight-400 pl-2 textCenter">年</h6>
                                </div>
                                <div class="col-6 input-group mt-3 mt-md-0">
                                    @include('layouts.parts.editor.select', ['name' => 'month', 'id'=>'month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                    <h6 class="font-weight-400 pl-2">月</h6>
                                </div>
                            </div>
                            <div class="col-6 mt-3 mt-md-0">
                                <label for="card" class="font-weight-bold">カード名義</label>
                                @include('layouts.parts.editor.text', ['name' => 'holdername', 'id'=>'holdername', 'type'=>'text', "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                            </div>
                        </section>
                        <section>
                            <label for="cardnumber" class="font-weight-bold">セキュリティコード</label>
                            @include('layouts.parts.editor.text', ['name'=>'securitycode', 'id'=>'securitycode', 'type'=>'text', 'contents' => 'class="form-control textCenter p-0"'])
                        </section>
                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <a href="javascript:submitPay();" class="btnSubmit" id="payment">支払い</a>
                                </div>
                            </div>
                        </section>
                    {{Form::close()}}

                </div>
            </div>

        </section>
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
