@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

    {{-- {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}} --}}
    <input type="hidden" id="sheet" value="{{$sheetId}}">
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-6 pl-0 pr-0 pr-md-2">
                <article class="bg-white col-12">
                    <h5 class="font-weight-bold mb-2">年払会員 (3,980円/年)</h5>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>️️月最大3回お金の専門家に相談が可能</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                    <div class="col text-center btnLayer">
                        @if($sheetId == 1)
                            @if($member != 3)
                                <button class="btnSelected" id="btnPlan1">選択中</button>
                                <input type="hidden" name="member" id="member" value="2">
                            @else
                                <button class="btnUnselected" id="btnPlan1">選択する</button>
                            @endif
                        @elseif($sheetId == 2)
                            @if($member == 2)
                                    <button class="btnSelected" id="btnPlan1">選択中</button>
                                    <input type="hidden" name="member" id="member" value="2">
                            @else
                                    <button class="btnUnselected" id="btnPlan1">選択する</button>
                            @endif
                        @endif
                    </div>
                </article>
            </div>

            <div class="col-sm-12 col-md-6 pl-0 pr-0 pl-md-2 mt-4 mt-md-0">
                <article class="bg-white col-12">
                    <h5 class="font-weight-bold mb-2">月払会員 (330円/月)</h5>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>月最大1回お金の専門家に相談が可能</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                    <div class="col text-center btnLayer">
                        @if($sheetId == 1)
                            @if($member == 3)
                                <button class="btnSelected" id="btnPlan2">選択中</button>
                                <input type="hidden" name="member" id="member" value="3">
                            @elseif($member == 1)
                                <button class="btnUnselected" id="btnPlan2">選択する</button>
                            @endif
                        @elseif($sheetId == 2)
                            @if($member == 3)
                                    <input type="hidden" name="member" id="member" value="3">
                                    <button class="btnSelected" id="btnPlan2">選択中</button>
                            @else
                                    <button class="btnUnselected" id="btnPlan2">選択する</button>
                            @endif
                        @endif
                    </div>
                </article>
            </div>

        </div>
    </section>
    <div class="row">
        <section class="col-12">
            <article class="bg-white col-12">
                <h5 class="font-weight-bold mb-2">クレジットカード</h5>
                <hr>
                <p>ご利用可能なクレジットカード</p>
                <p>VISA／Mastercard／JCB／AMEX／Diners／Orico／CF／JACCS／Life／eLIO</p>
                <div class="row">
                    <div class="col">
                        <img src="/images/svg/img-ranking-1.svg">
                        <img src="/images/svg/img-ranking-1.svg">
                        <img src="/images/svg/img-ranking-1.svg">
                        <img src="/images/svg/img-ranking-1.svg">
                        <img src="/images/svg/img-ranking-1.svg">

                    </div>
                    <div class="col text-center">
                        @if($sheetId == 1)
                            @if($member == 1)   <?php $member = 2?> @endif
                            <a class="btn btn-danger" href="{{url('payments/input/1').'/'.$member}}" id="cardBtn">クレジット決済を押す</a>
                        @elseif($sheetId == 2)
                        @if($member == 1)   <?php $member = 2?> @endif
                            <a class="btn btn-danger" href="{{url('payments/input/2').'/'.$member}}" id="cardBtn">クレジット決済を押す</a>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <a id="car1" class="btn btn-danger" href="{{url('paymenta/au').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-ranking-1.svg"></a>
                    <a id="car2" class="btn btn-danger" href="{{url('paymenta/docomo').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-ranking-2.svg"></a>
                    <a id="car3" class="btn btn-danger" href="{{url('paymenta/softbank').'/'.$sheetId.'/'.$member}}"><img src="/images/svg/img-ranking-3.svg"></a>
                </div>
                </article>
    </section>
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
