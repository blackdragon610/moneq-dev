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
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium">メールアドレス</p>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.email.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <section>
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email',
                                'contents' => 'class="form-control" placeholder="メールアドレス"
                                               style="border: 1px solid #707070"'])
                    </section>

                    <div class="row mt-3">
                        <div class="col"></div>
                        <div class="col-sm-4 text-center"><button type="button" id="gotoPro" class="btnUnselected">会員情報に戻る</button></div>
                        <div class="col-sm-4 text-center"><button class="proSubmit">変更を送信</button></div>
                        <div class="col"></div>
                    </div>

                {{Form::close()}}

            </div>
        </div>

    </div>
</div>
<button type="button" class="btn btn-alert-blue">
    <image src="/images/svg/image-fa-checkbox.svg">
    メッセージが送信されました。
    <span class="fa fa-close"></span>
</button>
@endsection
