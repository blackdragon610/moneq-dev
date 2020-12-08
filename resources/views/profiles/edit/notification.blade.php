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
                <li class="breadcrumb-item">通知設定</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium" style="padding-left:70px">通知設定</h5>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.notification.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                <div class="container" style="padding-left:70px;padding-right:70px">
                    <div class="col-7">
                        <div class="row" style="margin-top:14px">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">回答通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_answer == 1) echo 'checked'?> name="is_send_answer"/>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="row" style="margin-top:14px">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">メッセージの通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_message == 1) echo 'checked'?> name="is_send_message"/>
                                <span class="switcher"></span>
                            </label>

                        </div>
                        <div class="row" style="margin-top:14px">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">MoneQの通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_master == 1) echo 'checked'?> name="is_send_master"/>
                                <span class="switcher"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-5" style="width:300px">
                        <div class="row">
                            <button type="button" id="submitBtn" class="btn yellow-btn-304-50">変更を送信</button>
                        </div>
                        <div class="row" style="margin-top:12px">
                            <button type="button" id="gotoPro" class="btnUnselected">会員情報に戻る</button>
                        </div>
                    </div>

                </div>
            </div>
            {{Form::close()}}

        </div>

    </div>
</div>

<button type="button" id='notify' class="btn btn-alert-blue" style="display: none">
    <image src="/images/svg/image-fa-checkbox.svg">
    通知設定が変更されました。
    <span class="fa fa-close"></span>
</button>

<script>
    $('.fa').click(function(){
        $('#notify').hide();
    })

    $('#submitBtn').click(function(){

        let form_data = $("#form").serialize();

        $.ajax({

            type:"GET",
            data: form_data,
            url: "{{route('profiles.notification.update')}}",
            success: function(data) {
                if(data == "ok"){
                    $('#notify').show();
                }
            }
        });
    });

</script>

@endsection
