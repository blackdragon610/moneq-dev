@extends('layouts/front', ["type" => 1])

@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium" style="padding-left:70px">通知設定</h5>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.notification.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                <div class="container" style="padding-left:70px;padding-right:70px">
                    <div class="col-7">
                        <div class="row">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">回答通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_answer == 1) echo 'checked'?> name="is_send_answer"/>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="row">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">メッセージの通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_message == 1) echo 'checked'?> name="is_send_message"/>
                                <span class="switcher"></span>
                            </label>

                        </div>
                        <div class="row">
                            <label class="cl-switch cl-switch-red">
                                <div style="display:inline-block;width:180px"><span class="label">MoneQの通知</span></div>
                                <input type="checkbox" <?php if($user->is_send_master == 1) echo 'checked'?> name="is_send_master"/>
                                <span class="switcher"></span>
                            </label>
                        </div>                        
                    </div>
                    <div class="col-5" style="width:300px">
                        <div class="row">
                            <a href="{{route('profiles.notification.update')}}" class="btn yellow-btn-304-50">変更を送信</a>
                        </div>                        
                        <div class="row" style="margin-top:12px">
                            <a href="{{route('profiles.manage')}}" class="btnUnselected" style="width:300px">会員情報に戻る</a>
                        </div>                        
                    </div>
                    
                </div>
            </div>
            {{Form::close()}}

        </div>

    </div>
</div>

@endsection
