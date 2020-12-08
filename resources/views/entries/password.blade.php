@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white input-form-style">
            <p class="title-medium">パスワード</p>

            {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                <input type="hidden" name="member" id="member" value="2">
                <input type="hidden" name="mode" value="mode">

                <div class="row">
                    <div class="col-sm-12 bg-white">

                        <label for="password" class="label-regular">パスワード<span class="btn-tag-red">必須</span></label>
                        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])

                        <label for="password_confirm" class="label-regular">パスワード(確認用)<span class="btn-tag-red">必須</span></label>
                        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])

                    </div>
                </div>

                <div class="row" style="margin-top:80px">
                    <div class="col-12 col-sm-6">
                        <article class="col-12 p-0" style="background-color:#FFF9F2; max-width:488px; max-height:402px">
                            <div class="ribbon-wrapper">
                                <div class="ribbon">おすすめ</div>
                            </div>

                            <p class="title-small text-center">年払会員 (3,980円/年)</p>
                            <p class="title-16px" style="padding-left:65px;margin-top:27px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大3回お金の専門家に相談が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">1つの質問につき最大3回まで追加質問が可能</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">過去Q&Aはすべて見放題</p>
                            <p class="title-16px" style="padding-left:65px"><img src="/images/svg/img-check-red.svg" style="margin-right:5px">回答した専門家に個別相談を依頼できる</p>

                            <div class="col text-center" style="margin-top:48px;margin-bottom:48px">
                                <div class="btn white-btn-304-50" id="btnPlan1">選択する</div>
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
                                <div class="btn white-btn-304-50" id="btnPlan2">選択する</div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="row" style="margin-top:24px">
                    <div class="col-sm-12 offset-md-3 col-md-6 pl-0 pr-0">
                        <article class="col-12 p-0" style="background-color:#F5F5F5; max-width:488px; min-height:402px">
                            <p class="title-small text-center">無料会員</p>
                            <a href="#" class="text-dark"> 
                                <p class="title-16px text-center" style="margin-top:27px">
                                    <img src="/images/svg/img-check-red.svg" style="margin-right:5px">月最大3回までQ&Aが見れる
                                </p>
                            </a>

                            <div class="row justify-content-center" style="margin-top:150px;margin-bottom:48px">
                                <div class="btn white-btn-304-50 text-center" id="btnPlan3">選択する</div>
                            </div>
                        </article>
                    </div>
                </div>

            <div class="row mt-4">
                <div class="col text-center">
                    <button class="btnSubmit yellow-btn-304-50">次へ</button>
                </div>
            </div>
            {{Form::close()}}

            </div>
        </div>

    </div>
</div>

<script>
$('#btnPlan1').click(function(e) {
    $('#btnPlan1').addClass('btnSelected').removeClass('btnUnselected');
    $('#btnPlan2').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan3').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan1').html('選択中');
    $('#btnPlan2').html('選択する');
    $('#btnPlan3').html('選択する');
    $('#member').val(2);
});

$('#btnPlan2').click(function(e) {
    $('#btnPlan2').addClass('btnSelected').removeClass('btnUnselected');
    $('#btnPlan1').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan3').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan2').html('選択中');
    $('#btnPlan1').html('選択する');
    $('#btnPlan3').html('選択する');
    $('#member').val(3);
});

$('#btnPlan3').click(function(e) {
    $('#btnPlan3').addClass('btnSelected').removeClass('btnUnselected');
    $('#btnPlan1').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan2').addClass('btnUnselected').removeClass('btnSelected');
    $('#btnPlan3').html('選択中');
    $('#btnPlan1').html('選択する');
    $('#btnPlan2').html('選択する');
    $('#member').val(1);
});

</script>
@endsection
