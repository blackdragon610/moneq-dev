@extends('layouts/front', ["type" => 1])


@section('main')

<div class="container-fluid lightgreypanel p-3">
    <div class="container bg-white p-3">

        <h5 class="font-weight-bold">相談の投稿</h5>
        <hr class="mt-2 mb-4"/>
        <div class="container-fluid">
            <div class="row pl-2">
                <span class="name">今月はあと 3回 相談ができます。</span>
                <a id="reQ" class="text-dark">再質問権 0件</a>
            </div>
        </div>

        {{Form::open(['url'=> route('post.store'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <input type="hidden" name="post_id" id="post_id" value="{{$inputs['post_id']}}">
            <section>
                <div class="container-fluid pl-2">
                    <p><a id="firstQ" class="text-dark"><i class="fa fa-warning"></i> はじめて専門家に相談する方へ</a></p>
                    <p><i class="fa fa-stop"></i> 相談の禁止事項</p>
                    <p>よくある相談の禁止事項</p>
                    <ul>
                        <li><i class="fa fa-check"></i>個人情報の記載</li>
                        <li><i class="fa fa-check"></i>特定の企業、商品、サービスに関する記載</li>
                        <li><i class="fa fa-check"></i>違法行為・犯罪に関連する投稿</li>
                        <li><i class="fa fa-check"></i>質問や回答と関係のないURLの記載</li>
                        <li><i class="fa fa-check"></i>お礼や報告など質問ではない投稿</li>
                    </ul>
            <section>
                <label for="" >相談テーマ</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name',  'contents' => 'placeholder="例：お金のことで相談がある"'])<br />
            </section>

            <section>
                <label for="" >カテゴリ</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.select', ['name' => 'sub_category_id',  "file" => $categories, "keyValue" => "", "contents" => ""])<br />
            </section>

            <section>
                <div class="row">
                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                                    <p>【資産運用】</p>
                                    <div class="row">
                                        <span><a href="#" class="pr-3 text-dark">お金の貯め方全般</a></span>
                                        <span><a href="#" class="pr-3 text-dark">貯金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">定期預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">外貨預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">積立株式投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">NISA</a></span>
                                        <span><a href="#" class="pr-3 text-dark">投資信託</a></span>
                                        <span><a href="#" class="pr-3 text-dark">ETF</a></span>
                                        <span><a href="#" class="pr-3 text-dark">REITFX</a></span>
                                        <span><a href="#" class="pr-3 text-dark">金投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">CFD</a></span>
                                        <span><a href="#" class="pr-3 text-dark">先物取引</a></span>
                                        <span><a href="#" class="pr-3 text-dark">仮想通貨不動産投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">賃貸経営</a></span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
            <section>
                <label for="" >相談内容</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />
            </section>
            <section>
                <div class="row">
                    <div class="col text-center btnLayer">
                        @if (!empty($isConfirmation))
                            {!! Form::submit('修正', ['class' => 'btnSubmit', 'name' => 'reInput']) !!}
                            {!! Form::submit('確定', ['class' => 'btnSubmit', 'name' => 'end']) !!}
                        @else
                            <button class="btnSubmit" id="preSave">一時保存</button>
                            <button class="btnSubmit">相談を投稿</button>
                        @endif
                    </div>
                </div>
            </section>

        {{Form::close()}}


    </div>
</div>
@include('layouts.modals.firstQuery')
@include('layouts.modals.reQuery')

<script>
    $("#preSave").click(function (e) {

        $('.error-box').remove();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            post_id: $('#post_id').val(),
            post_name: $('#post_name').val(),
            sub_category_id: $('#sub_category_id').val(),
            body: $('#body').val()
        }

        var type = "POST"; //for creating new resource
        $.ajax({
            type: type,
            url: "{{route('post.preStore')}}",
            data: formData,
            success: function (data) {
                console.log(data['ok']);
                if(!data['ok']){
                    $.each(data.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<p class="error-box">'+error[0]+'</p>'));
                    });
                }else{
                    $('#post_id').val(data['ok']);
                    $('.toast').toast('show');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('#firstQ').click(function(e){
        $('#firstModal').modal('show');
    })

    $('#reQ').click(function(e){
        $('#rQModal').modal('show');
    })

    $('#fBtn').click(function(e){
        $('#firstModal').modal('hide');
    })

    $('#rBtn').click(function(e){
        $('#rQModal').modal('hide');
    })
</script>


@endsection

