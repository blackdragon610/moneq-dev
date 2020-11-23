@extends('layouts/front', ["type" => 1])

@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">プロフィール</h5>
                    <hr class="mt-2 mb-3"/>

                    {{Form::open(['url'=> route('profiles.profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <section>
                            <label for="" class="font-weight-bold">ニックネーム</label><span class="text-danger">(必須)</span><br/>
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', 'contents' => 'class="form-control" placeholder="パスワード"'])<br />

                            <label for="sex" class="font-weight-bold">性別</label><span class="text-danger">(必須)</span><br/>
                            <div class="pt-2">
                                @include('layouts.parts.editor.radioext', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                            </div>

                            <label for="birthday" class="font-weight-bold">生年月日</label><span class="text-danger">(必須)</span><br />
                            <div class="row">
                                <div class="col-sm-12 col-md-3 input-group mt-3 mt-md-0">
                                    @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                    <h6 class="font-weight-400 pl-2 textCenter">年</h6>
                                </div>
                                <div class="col-sm-12 col-md-3 input-group mt-3 mt-md-0">
                                    @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                    <h6 class="font-weight-400 pl-2">月</h6>
                                </div>
                                <div class="col-sm-12 col-md-3 input-group mt-3 mt-md-0">
                                    @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                    <h6 class="font-weight-400 pl-2">日</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 pt-2">
                                    <label for="birthday" class="font-weight-bold">お住まいの都道府県</label><span class="text-danger">(必須)</span><br />
                                    @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                </div>
                                <div class="col-sm-12 col-md-6 pt-2">
                                    <label for="birthday" class="font-weight-bold">職業</label><span class="text-danger">(必須)</span><br />
                                    @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                </div>
                                <div class="col-sm-12 col-md-6 pt-2">
                                    <label for="birthday" class="font-weight-bold">婚姻状況</label><span class="text-danger">(必須)</span><br />
                                    @include('layouts.parts.editor.select', ['name' => 'marriage', "file" => configJson("custom/marriage"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                </div>
                                <div class="col-sm-12 col-md-6 pt-2">
                                    <label for="birthday" class="font-weight-bold">子供人数</label><span class="text-danger">(必須)</span><br />
                                    @include('layouts.parts.editor.select', ['name' => 'child', "file" => configJson("custom/child"), "keyValue" => "", 'contents' => 'class="form-control textCenter p-0"'])
                                </div>
                            </div>

                            <section>
                                <label for="" class="font-weight-bold">お金についての悩みはありますか？</label><span class="text-danger">(複数選択)</span><br/>
                                @include('layouts.parts.editor.checkboxext', ['name' => 'trouble', "file" => configJson("custom/trouble"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])
                            </section>

                            <label for="" class="font-weight-bold">世帯収入</label>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    @include('layouts.parts.editor.select', ['name' => 'income', "file" => configJson("custom/income"), "keyValue" => "", 'contents' => 'class="form-control p-0 textCenter"'])<br />
                                </div>
                            </div>

                            <section>
                                <label for="" class="font-weight-bold">家族構成</label><span class="text-danger">(複数選択)</span><br/>
                                @include('layouts.parts.editor.checkboxext', ['name' => 'family', "file" => configJson("custom/family"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])<br />
                            </section>
                            <label for="" class="font-weight-bold">住まい</label>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    @include('layouts.parts.editor.select', ['name' => 'live', "file" => configJson("custom/live"), "keyValue" => "", 'contents' => 'class="form-control p-0 textCenter"'])<br />
                                </div>
                            </div>

                        </section>

                        <section>
                            <div class="d-flex justify-content-end">
                                <button class="btnSubmit">変更する</button>
                            </div>
                        </section>
                    {{Form::close()}}

                    {{Form::open(['url'=> route('profiles.manage'),'method'=>'GET', 'files' => false, 'id' => 'form'])}}
                        <section style="position:absolute; bottom:0px;">
                            <button class="btnUnselected">会員情報に戻る</button>
                        </section>
                    {{Form::close()}}

                </div>
            </div>

        </section>

    </div>
</div>

@endsection
