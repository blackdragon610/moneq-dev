@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="container bg-white p-3 pl-5">

        {{Form::open(['url'=> route('expert.message.send'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

            <input type="hidden" value='{{$expertId}}' name = 'expert_id'>
            <section>
                <div class="row">
                    <img src="/images/svg/user.svg" alt="">
                    <h5 class="font-weight-bold">「テスト花子」さんにメッセージ</h5>
                </div>
            </section>

            <section>
                <label for="birthday" class="label-regular">お名前<span class="btn-tag-red">必須</span></label>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 input-group mt-3 mt-md-0">
                        <h6 class="font-weight-400 pl-2 textCenter" style="width:50px">姓</h6>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'surname', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 input-group mt-3 mt-md-0">
                        <h6 class="font-weight-400 pl-2" style="width:50px">名</h6>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'lastname', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                </div>
                <div class="row mt-sm-3">
                    <div class="col-sm-12 col-md-6 input-group mt-3 mt-md-0">
                        <h6 class="font-weight-400 pl-2 textCenter" style="width:50px">セイ</h6>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'surnameen', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                    <div class="col-sm-12 col-md-6 input-group mt-3 mt-md-0">
                        <h6 class="font-weight-400 pl-2" style="width:50px">メイ</h6>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'lastnameen', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                </div>
            </section>

            <section>
                <label class="label-regular">相談・問い合わせの種類<span class="btn-tag-red">必須</span></label>
                @include('layouts.parts.editor.select', ['name' => 'kind', "file" => $categories, "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
            </section>

            <section>
                <label class="label-regular">相談内容<span class="btn-tag-red">必須</span></label>
                @include('layouts.parts.editor.textarea', ['name' => 'description', "contents" => ""])<br />
            </section>

            <section>
                <div class="row">
                    <div class="col">
                        <label class="label-regular">電話によるご連絡を希望の方</label><span class="btn-tag-brown">(任意)</span>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'hope', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                    <div class="col">
                    <label class="label-regular">ご希望の連絡時間</label><span class="btn-tag-brown">(任意)</span>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'hopetime', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                </div>
            </section>
            <section>
                <div class="col text-center ">
                    <button class="btn modal-btn-304-50 ml-0">メッセージ送信</button>
                </div>
            </section>
        {{Form::close()}}

        </div>

    </div>
</div>
@endsection
