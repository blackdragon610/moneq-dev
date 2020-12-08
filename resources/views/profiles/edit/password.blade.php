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
                <li class="breadcrumb-item">パスワード</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white input-form-style">
                <p class="title-medium">パスワード</p>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.password.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <section>
                        <label for="" class="label-regular">パスワード</label>
                        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'id' => 'password',
                                'contents' => 'class="form-control" placeholder="パスワードを入力"
                                               style="border: 1px solid #707070"'])
                        <p class="error-box" id="password_error" style="display: none"></p>

                        <label for="" class="label-regular" style="margin-top:12px;color:#dbdbdb">パスワード(確認用)</label>
                        @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'id' => 'password_confirmation',
                                'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"
                                               style="border: 1px solid #707070"'])
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

<button type="button" id='notify' class="btn btn-alert-blue" style="display: none">
    <image src="/images/svg/image-fa-checkbox.svg">
    パスワードが変更されました。
    <span class="fa fa-close"></span>
</button>

<script>
    $('.fa').click(function(){
        $('#notify').hide();
    })

    $('#submitBtn').click(function(){
        var form_data = {
            password : $('#password').val(),
            password_confirmation : $('#password_confirmation').val(),
        }
        $.ajax({

            type:"GET",
            data: form_data,
            url: "{{route('profiles.password.update')}}",
            success: function(data) {
                if(data == "ok"){
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
