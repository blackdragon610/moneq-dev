@extends('layouts/front', ["type" => 1])

@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>
            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">通知設定</h5>
                    <hr class="mt-2 mb-3"/>
                       {{Form::open(['url'=> route('profiles.notification.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                         <div class="container row p-2">
                            <div class="col">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?php if($user->is_send_answer == 1) echo 'checked'?> data-toggle="toggle" data-style="ios" name="is_send_answer"> 回答通知
                                </label>
                           </div>
                            <div class="col">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?php if($user->is_send_message == 1) echo 'checked'?> data-toggle="toggle" data-style="ios" name="is_send_message"> メッセージの通知
                                </label>
                            </div>
                            <div class="col">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?php if($user->is_send_master == 1) echo 'checked'?> data-toggle="toggle" data-style="ios" name=is_send_master> MoneQの通知
                                </label>
                            </div>
                        </div>
                        <section>
                            <div class="d-flex justify-content-end">
                                <button class="btnSubmit">次へ</button>
                            </div>
                        </section>
                        {{Form::close()}}
                        {{Form::open(['url'=> route('profiles.manage'),'method'=>'GET', 'files' => false, 'id' => 'form'])}}
                            <section style="position:absolute; bottom:0px;">
                                <button class="btnUnselected">入力をスキップする</button>
                            </section>
                        {{Form::close()}}
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
