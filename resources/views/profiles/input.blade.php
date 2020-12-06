@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container ">

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white">
                <p class="title-medium">プロフィール登録</p>

                {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

                        <label for="sex" class="label-regular">性別</label><span class="btn-tag-red">(必須)</span>
                        <div class="pt-2">
                            @include('layouts.parts.editor.radioext', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])
                        </div>

                        <label for="birthday" class="label-regular">生年月日</label><span class="btn-tag-red">(必須)</span>
                        <div class="row">
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2 textCenter"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;">年</h6>
                            </div>

                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;">月</h6>
                            </div>
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;">日</h6>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">お住まいの都道府県</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">職業</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular">婚姻状況</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.select', ['name' => 'marriage', "file" => configJson("custom/marriage"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                            <div class="col-sm-12 col-md-6 pt-2">
                                <label for="birthday" class="label-regular  ">子供人数</label><span class="btn-tag-red">(必須)</span>
                                @include('layouts.parts.editor.select', ['name' => 'child', "file" => configJson("custom/child"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center btnLayer">
                                <button class="btnSubmit yellow-btn-304-50">次へ</button>
                            </div>
                        </div>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>
@endsection
