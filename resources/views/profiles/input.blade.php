@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 col-lg-12 bg-white">
                <h5 class="font-weight-bold p-2">プロフィール登録</h5>
                <hr class="mt-2 mb-3"/>

                {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
    
                    <label for="sex" class="font-weight-bold">性別</label><span class="text-danger">(必須)</span><br/>
                    @include('layouts.parts.editor.radio', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />

                    <label for="birthday" class="font-weight-bold">生年月日</label><span class="text-danger">(必須)</span><br />
                    <div class="mb-2">
                        @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => ''])年
                        @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => ''])月
                        @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => ''])日
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="birthday" class="font-weight-bold">お住まいの都道府県</label><span class="text-danger">(必須)</span><br />
                            @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="birthday" class="font-weight-bold">職業</label><span class="text-danger">(必須)</span><br />
                            @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="birthday" class="font-weight-bold">婚姻状況</label><span class="text-danger">(必須)</span><br />
                            @include('layouts.parts.editor.select', ['name' => 'marriage', "file" => configJson("custom/marriage"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="birthday" class="font-weight-bold">子供人数</label><span class="text-danger">(必須)</span><br />
                            @include('layouts.parts.editor.select', ['name' => 'child', "file" => configJson("custom/child"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button class="bg-dark text-white p-3 pl-5 pr-5">次へ</button>
                        </div>
                    </div>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection
