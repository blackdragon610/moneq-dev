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
                <li class="breadcrumb-item">メールアドレス</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px" >
            <div class="col-md-12 col-lg-12 input-form-style">
                <p class="title-medium">メールアドレス</p>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> '#', 'files' => false, 'id' => 'form'])}}
                    <input type="hidden" name="mode" value="email">

                    <section>
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email',
                                'contents' => 'class="form-control" placeholder="メールアドレス"
                                               style="border: 1px solid #707070"'])
                        <p class="error-box" id="email_error" style="display: none"></p>
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
    メッセージが送信されました。
    <span class="fa fa-close"></span>
</button>

<script>
    $('.fa').click(function(){
        $('#notify').hide();
    })

    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });

    $('#submitBtn').click(function(){
        let form_data = $("#form").serialize();
        $.ajax({

            type:"GET",
            data: form_data,
            url: "{{route('profiles.email.update')}}",
            success: function(data) {
                console.log('2134');

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
