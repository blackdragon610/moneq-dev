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

                <p class="title-medium" style="padding-left:70px">相談の投稿</p>
                <div class="container" style="padding-left:70px">
                    <div class="row" style="padding-left:15px">
                        <span class="title-16px" style="padding-top:8px">今月はあと</span>
                        <span class="title-24px-red">{{$possibleCount}}</span>
                        <span class="title-16px" style="padding-top:8px">回 相談ができます。</span>
                        <u><a id="reQ" class="text-dark title-16px">再質問権
                            <span class="title-24px-red">{{\Auth::user()->re_point}}</span>件
                        </a></u>
                    </div>

                    {{Form::open(['url'=> route('post.store'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <input type="hidden" name="post_id" id="post_id" value="{{$inputs['post_id']}}">

                        <div class="container-fluid pl-2">
                            <p class="title-16px" style="margin-top:20px">
                                <u><a id="firstQ" class="text-dark"><img src="/images/svg/img-book-downside.svg"> はじめて専門家に相談する方へ</a></u>
                            </p>
                            <p class="title-16px" style="margin-top:24px">
                                <img src="/images/svg/img-ban-solid.svg"> <u>相談の禁止事項</u>
                            </p>

                            <p class="title-16px" style="color:#707070">よくある相談の禁止事項</p>
                            <ul>
                                <li class="title-16px" style="list-style:disc;margin-left:24px">個人情報の記載</li>
                                <li class="title-16px" style="list-style:disc;margin-left:24px">特定の企業、商品、サービスに関する記載</li>
                                <li class="title-16px" style="list-style:disc;margin-left:24px">違法行為・犯罪に関連する投稿</li>
                                <li class="title-16px" style="list-style:disc;margin-left:24px">質問や回答と関係のないURLの記載</li>
                                <li class="title-16px" style="list-style:disc;margin-left:24px">お礼や報告など質問ではない投稿</li>
                            </ul>

                            <label for="post_name" class="label-regular" style="margin-top:48px">相談テーマ</label><span class="btn-tag-red">必須</span>
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name',  'contents' => 'placeholder="例：結婚するのですが生命保険に入るべきでしょうか？"'])
                            <div class="text-right"><span id="name_length">0/25</span></div>

                            <label for="sub_category_id" class="label-regular">カテゴリ<span class="btn-tag-red">必須</span></label>
                            <div class="col-sm-6" style="padding:0">@include('layouts.parts.editor.select', ['name' => 'sub_category_id',  "file" => $categories, "keyValue" => "", "contents" => ""])</div>

                            <label for="body" class="label-regular">相談内容<span class="btn-tag-red">必須</span></label>

                            <div style="background-color:#FFF5E9">
                                <p class="label-14px">
                                    具体的な情報（数字や年数など）、相談の状況（年齢、年収、家族構成など）、聞きたいことを簡約にまとめると<br/>
                                    より早く、より多くの専門家から回答される可能性が高くなります。
                                </p>
                                <ul>
                                    <li class="label-14px" style="list-style:disc;margin-left:24px">年収（約650万円など</li>
                                    <li class="label-14px" style="list-style:disc;margin-left:24px">ご自分の年齢（厳しい場合は「30代」などの年代でもかまいません）</li>
                                    <li class="label-14px" style="list-style:disc;margin-left:24px">お子さんの年齢（厳しい場合は「幼稚園児」「小学生」などでも構いません）</li>
                                </ul>
                            </div>


                            @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />
                            <div class="text-right"><span id="post_length">0/1600</span></div>

                            <div class="row">
                                <div class="col text-center btnLayer">
                                    @if (!empty($isConfirmation))
                                        {!! Form::submit('修正', ['class' => 'btnSubmit', 'name' => 'reInput']) !!}
                                        {!! Form::submit('確定', ['class' => 'btnSubmit', 'name' => 'end']) !!}
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

    $('#post_name').on('keyup', function(){
        var text = $(this).val().length;
        $('#name_length').text(text + '/' + '25');
    });

    $('#body').on('keyup', function(){
        var text = $(this).val().length;
        $('#post_length').text(text + '/' + '1600');
    });
</script>


@endsection

