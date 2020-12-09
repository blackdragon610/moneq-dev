@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">
        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/other/access')}}" style="color:#9B9B9B">相談の投稿</a>
                </li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white">

                @if(!$isConfirmation)
                    <p class="title-medium" style="padding-left:70px">相談の投稿</p>
                @else
                    <p class="title-medium" style="padding-left:70px">相談投稿の確認</p>
                @endif

                <div class="container" style="padding-left:70px">
                    @if(!$isConfirmation)
                        <div class="row" style="padding-left:15px">
                            <span class="title-16px" style="padding-top:8px">今月はあと</span>
                            <span class="title-24px-red">{{$possibleCount}}</span>
                            <span class="title-16px" style="padding-top:8px">回 相談ができます。</span>
                            <a id="reQ" class="text-dark title-16px"><u>再質問権</u>
                                <span class="title-24px-red">{{\Auth::user()->re_point}}</span>件
                            </a>
                        </div>
                    @endif

                    {{Form::open(['url'=> route('post.store'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <input type="hidden" name="post_id" id="post_id" value="{{$inputs['post_id']}}">

                        <div class="container-fluid pl-2">
                            @if(!$isConfirmation)
                                <p class="title-16px" style="margin-top:20px">
                                    <a id="firstQ" class="text-dark"><img src="/images/svg/img-book-downside.svg" style="margin-right:15px"> <u>はじめて専門家に相談する方</u>へ</a>
                                </p>
                                <p class="title-16px" style="margin-top:24px">
                                    <img src="/images/svg/img-ban-solid.svg" style="margin-right:15px"><u>相談の禁止事項</u>
                                </p>

                                <p class="title-16px" style="color:#707070;margin-left:32px">よくある相談の禁止事項</p>
                                <ul style="margin-left:32px">
                                    <li class="title-16px">・個人情報の記載</li>
                                    <li class="title-16px">・特定の企業、商品、サービスに関する記載</li>
                                    <li class="title-16px">・違法行為・犯罪に関連する投稿</li>
                                    <li class="title-16px">・質問や回答と関係のないURLの記載</li>
                                    <li class="title-16px">・お礼や報告など質問ではない投稿</li>
                                </ul>
                            @endif

                            <label for="post_name" class="label-regular" style="margin-top:48px">相談テーマ
                                @if(!$isConfirmation)
                                    <span class="btn-tag-red">必須</span>
                                @endif
                            </label>
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name', 'id' => 'post_name',  'contents' => 'placeholder="例：結婚するのですが生命保険に入るべきでしょうか？" style="border:1px solid #707070"'])

                            @if(!$isConfirmation)
                                <div class="text-right"><span id="name_length">0/25</span></div>
                            @endif

                            <label for="sub_category_id" class="label-regular">カテゴリ
                                @if(!$isConfirmation)
                                    <span class="btn-tag-red">必須</span>
                                @endif
                            </label>
                            <div class="col-sm-6" style="padding:0">@include('layouts.parts.editor.select', ['name' => 'sub_category_id',  "file" => $categories, "keyValue" => "", 'contents' => 'style="border:1px solid #221815"'])</div>

                            <label for="body" class="label-regular">相談内容
                                @if(!$isConfirmation)
                                    <span class="btn-tag-red">必須</span>
                                @endif
                            </label>

                            @if(!$isConfirmation)
                                <div style="background-color:#FFF5E9;padding:24px">
                                    <p class="label-14px">
                                        具体的な情報（数字や年数など）、相談の状況（年齢、年収、家族構成など）、聞きたいことを簡約にまとめると<br/>
                                        より早く、より多くの専門家から回答される可能性が高くなります。
                                    </p>
                                    <ul>
                                        <li class="label-14px">・年収（約650万円など</li>
                                        <li class="label-14px">・ご自分の年齢（厳しい場合は「30代」などの年代でもかまいません）</li>
                                        <li class="label-14px">・お子さんの年齢（厳しい場合は「幼稚園児」「小学生」などでも構いません）</li>
                                    </ul>
                                </div>
                            @endif


                            @include('layouts.parts.editor.textarea', ['name' => 'body', 'contents' => 'style="border:1px solid #707070"'])<br />

                            @if(!$isConfirmation)
                                <div class="text-right"><span id="post_length">0/1600</span></div>
                            @endif

                            <div class="row">
                                <div class="col text-center btnLayer">
                                    @if (!empty($isConfirmation))
                                        {!! Form::submit('修正', ['class' => 'btnSubmit white-btn-304-50', 'name' => 'reInput']) !!}
                                        {!! Form::submit('確定', ['class' => 'btnSubmit yellow-btn-304-50', 'name' => 'end']) !!}
                                    @else
                                        <button class="btnSubmit white-btn-304-50" style="border:1px solid #221815;margin-right:24px" id="preSave">一時保存</button>
                                        <button class="btnSubmit yellow-btn-304-50">相談を投稿</button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    {{Form::close()}}
                </div>

            </div>
        </div>

    </div>
</div>
@include('layouts.modals.firstQuery')
@include('layouts.modals.reQuery')

<button type="button" id='notify' class="btn btn-alert-blue" style="display: none">
    <image src="/images/svg/image-fa-checkbox.svg">
        一時保存が成功しました。
    <span class="fa fa-close"></span>
</button>

<script>

    $(document).ready(function() {
        $('#post_name').keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });

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
                if(!data['ok']){
                    $.each(data.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<p class="error-box">'+error[0]+'</p>'));
                    });
                }else{
                    $('#post_id').val(data['ok']);
                    $('#notify').show();
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

    $('#post_name').on('keyup', function(){
        var text = $(this).val().length;
        $('#name_length').text(text + '/' + '25');
    });

    $('#body').on('keyup', function(){
        var text = $(this).val().length;
        $('#post_length').text(text + '/' + '1600');
    });

    $('.fa').click(function(){
        $('#notify').hide();
    })
</script>


@endsection

