@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel">
    <div class="container p-3">
    
        <div class="container bg-white p-3 pl-5">

        {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
            <section>
                <div class="row">
                    <img src="http://placehold.it/50x50?text=P" alt="">
                    <h5 class="font-weight-bold">「テスト花子」さんにメッセージ</h5>
                </div>
            </section>

            <section>
                <label for="birthday" class="font-weight-bold">お名前</label><span class="text-danger">(必須)</span><br />
                <div class="row">
                    <div class="col-sm-12 col-md-6 input-group mt-3 mt-md-0">
                        <h6 class="font-weight-400 pl-2 textCenter" style="width:50px">姓</h6>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'surname', 'contents' => 'class="form-control", placeholder=""'])
                    </div>
                    <div class="col-sm-12 col-md-6 input-group mt-3 mt-md-0">
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
                <label class="font-weight-bold">相談・問い合わせの種類</label><span class="text-danger">(必須)</span><br />
                @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
            </section>

            <section>
                <p>相談・問い合わせ内容（任意)</p>
                <textarea rows = "5" cols = "100%" name = "description">
                </textarea>
            </section>

            <section>
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">電話によるご連絡を希望の方</label><span class="text-danger">(必須)</span><br />
                        @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0 "'])
                    </div>
                    <div class="col">
                        <label class="font-weight-bold">ご希望の連絡時間</label><span class="text-danger">(必須)</span><br />
                        @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0 "'])
                    </div>
                </div>
            </section>
            <section>
                <div class="col text-center ">
                    <button class="btnSubmit">メッセージ送信</button>
                </div>
            </section>
        {{Form::close()}}

        </div>

    </div>
</div>
@endsection
