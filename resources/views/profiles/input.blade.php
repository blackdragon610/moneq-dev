@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">
                    <h5 class="font-weight-bold p-2">プロフィール登録</h5>
                    <hr class="mt-2 mb-3"/>

                    {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
        
                        <section>
                            <label for="sex" class="font-weight-bold">性別</label><span class="text-danger">(必須)</span><br/>
                            <div class="pt-2">
                                @include('layouts.parts.editor.radioext', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                            </div>
                        </section>

                        <section>
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
                        </section>

                        <section>
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
                        </section>
                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <button class="btnSubmit">次へ</button>
                                </div>
                            </div>
                        </section>
                    {{Form::close()}}

                </div>
            </div>

        </section>
    </div>
</div>
@endsection
