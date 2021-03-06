@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container ">

        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/profile/manage')}}" style="color:#9B9B9B">会員情報</a>
                </li>
                <li class="breadcrumb-item">プロフィール登録</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-12 bg-white input-form-style">
                <p class="title-medium">プロフィール登録</p>

                {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

                        <label for="sex" class="label-regular">性別<span class="btn-tag-red">必須</span></label>
                        <div class="pt-2">
                            @include('layouts.parts.editor.radioext', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])
                        </div>

                        <label for="birthday" class="label-regular">生年月日<span class="btn-tag-red">必須</span></label>
                        <div class="row">
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2 textCenter"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815">年</h6>
                            </div>

                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815">月</h6>
                            </div>
                            <div class="col-sm-12 col-md-2 input-group mt-3 mt-md-0">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => 'class="form-control btn-select p-0"'])
                                <h6 class="font-weight-400 pl-2"
                                    style="padding-top:10px;font-family:NotoSans-JP-Regular;font-size:16px !important;color:#221815">日</h6>

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
