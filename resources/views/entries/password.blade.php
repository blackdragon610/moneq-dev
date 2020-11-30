@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

    {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
        <input type="hidden" name="member" id="member" value="2">
        <input type="hidden" name="mode" value="mode">
    <section>
        <div class="row">
            <div class="col-sm-12 bg-white">
                <h5 class="font-weight-bold p-2">パスワードの入力</h5>
                <hr class="mt-2 mb-3"/>

                <label for="password">パスワード</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])<br />

                <label for="password_conform">パスワード(確認用)</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])<br />

            </div>
        </div>
    </section>
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
                        <div class="btnSelected" id="btnPlan1">選択中</div>
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
                        <div class="btnUnselected" id="btnPlan2">選択する</div>
                    </div>
                </article>
            </div>

        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-sm-12 offset-md-3 col-md-6 pl-0 pr-0">
                <article class="bg-white col-12">
                    <h5 class="font-weight-bold mb-2">無料会員</h5>
                    <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>月最大3回までQ&Aが見れる</p>
                    <div class="col text-center btnLayer">
                        <div class="btnUnselected" id="btnPlan3">選択する</div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <div class="row mt-4">
        <div class="col text-center">
            <button class="btnSubmit">次へ</button>
        </div>
    </div>
    {{Form::close()}}

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
