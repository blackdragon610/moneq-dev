@extends('layouts/front', ["type" => 1])

@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/profile/manage')}}" style="color:#9B9B9B">会員情報</a>
                </li>
                <li class="breadcrumb-item">プロフィール</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white input-form-style">
                <p class="title-medium">プロフィール</p>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <section>
                        <label for="" class="label-regular">ニックネーム<span class="btn-tag-red">必須</span></label>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', 'id' => 'nickname', 'contents' => 'class="form-control col-sm-6" placeholder="ニックネームを入力" style="max-width:500px;border:1px solid #f0f0f0 !important"'])
                        <p class="error-box col-sm-6" id="nickname_error" style="display: none"></p>

                        <label for="sex" class="label-regular">性別<span class="btn-tag-red">必須</span></label>
                        <div class="pt-2">
                            @include('layouts.parts.editor.radioext', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])
                        </div>

                        <label for="birthday" class="label-regular">生年月日<span class="btn-tag-red">必須</span></label>
                        <div class="row">
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2 textCenter"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815;">年</h6>
                            </div>

                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815;">月</h6>
                            </div>
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815;">日</h6>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">お住まいの都道府県<span class="btn-tag-red">必須</span></label>
                                @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">職業<span class="btn-tag-red">必須</span></label>
                                @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">婚姻状況<span class="btn-tag-red">必須</span></label>
                                @include('layouts.parts.editor.select', ['name' => 'marriage', "file" => configJson("custom/marriage"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular  ">子供人数<span class="btn-tag-red">必須</span></label>
                                @include('layouts.parts.editor.select', ['name' => 'child', "file" => configJson("custom/child"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                        </div>

                        <section>
                            <label for="" class="label-regular">お金についての悩みはありますか？</label><br/>
                            @include('layouts.parts.editor.checkboxext', ['name' => 'trouble', "file" => configJson("custom/trouble"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])
                        </section>

                        <label for="" class="label-regular">世帯収入</label>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                @include('layouts.parts.editor.select', ['name' => 'income', "file" => configJson("custom/income"), "keyValue" => "", 'contents' => 'class="form-control p-0 btn-select"'])
                            </div>
                        </div>

                        <section>
                            <label for="" class="label-regular">家族構成</label><br/>
                            @include('layouts.parts.editor.checkboxext', ['name' => 'family', "file" => configJson("custom/family"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])
                        </section>

                        <label for="" class="label-regular">住まい</label>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                @include('layouts.parts.editor.select', ['name' => 'live', "file" => configJson("custom/live"), "keyValue" => "", 'contents' => 'class="form-control p-0 btn-select"'])
                            </div>
                        </div>

                    </section>

                    <div class="row mt-3">
                        <div class="col"></div>
                        <div class="col-sm-4 text-center"><button type="button" id="gotoPro" class="btnUnselected">会員情報に戻る</button></div>
                        <div class="col-sm-4 text-center"><button type="button" id="submitBtn" class="proSubmit">変更を送信</button></div>
                        <div class="col"></div>
                    </div>
                {{Form::close()}}

            </div>
        </div>


    </div>
</div>

<button type="button" id='notify' class="btn btn-alert-blue" style="display:none">
    <image src="/images/svg/image-fa-checkbox.svg">
    プロフィールが変更されました。
    <span class="fa fa-close"></span>
</button>

<script>

    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });


    $('.fa').click(function(){
        $('#notify').hide();
    })

    $('#submitBtn').click(function(){
        let form_data = $("#form").serialize();
        $.ajax({

            type:"GET",
            data: form_data,
            url: "{{route('profiles.profile.update')}}",
            success: function(data) {
                if(data == "ok"){
                    $("html, body").animate({ scrollTop: 0 }, 0);
                    $('.error-box').hide();
                    $('#notify').show();
                }
            },
            error: function (reject) {
                $('.error-box').hide();
                if( reject.status === 400 ) {
                    $.each(reject.responseJSON.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                        $("#" + key + "_error").show();
                    });
                }
            }
        });
    });

</script>

@endsection
