@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

    {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
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
                        <a href="#" class="btnSelected" id="btnPlan1">選択中</a>
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
                        <a href="#" class="btnUnselected" id="btnPlan2">選択する</a>
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
                        <button class="btn btn-danger" id="btnPlan3">選択する</button>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <a class="btn btn-danger"><img src="/images/svg/img-ranking-1.svg"></a>
                    <a class="btn btn-danger"><img src="/images/svg/img-ranking-2.svg"></a>
                    <a class="btn btn-danger"><img src="/images/svg/img-ranking-3.svg"></a>
                </div>
                </article>
    </section>
    </div>

    {{Form::close()}}

    </div>
</div>

<script>
    $('#btnPlan1').click(function(e) {
        $('#btnPlan1').addClass('btnSelected').removeClass('btnUnselected');
        $('#btnPlan2').addClass('btnUnselected').removeClass('btnSelected');
        $('#btnPlan1').html('選択中');
        $('#btnPlan2').html('選択する');
    });

    $('#btnPlan2').click(function(e) {
        $('#btnPlan2').addClass('btnSelected').removeClass('btnUnselected');
        $('#btnPlan1').addClass('btnUnselected').removeClass('btnSelected');
        $('#btnPlan2').html('選択中');
        $('#btnPlan1').html('選択する');
    });

</script>
@endsection
