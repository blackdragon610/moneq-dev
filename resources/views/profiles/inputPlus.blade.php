@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium">追加質問</p>

                {{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <label for="" class="label-regular">お金についての悩みはありますか？</label><span class="btn-tag-red">(複数選択)</span><br/>
                    @include('layouts.parts.editor.checkboxext', ['name' => 'trouble', "file" => configJson("custom/trouble"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])

                    <label for="" class="label-regular">世帯収入</label>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            @include('layouts.parts.editor.select', ['name' => 'income', "file" => configJson("custom/income"), "keyValue" => "", 'contents' => 'class="form-control p-0 btn-select"'])
                        </div>
                    </div>

                    <label for="" class="label-regular">家族構成</label><span class="btn-tag-red">(複数選択)</span><br/>
                    @include('layouts.parts.editor.checkboxext', ['name' => 'family', "file" => configJson("custom/family"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])<br />

                    <label for="" class="label-regular">住まい</label>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            @include('layouts.parts.editor.select', ['name' => 'live', "file" => configJson("custom/live"), "keyValue" => "", 'contents' => 'class="form-control p-0 btn-select"'])
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btnSubmit white-btn-304-50" style="border:1px solid #221815;margin-right:24px" id="preSave">入力をスキップする</button>
                        <button class="btnSubmit yellow-btn-304-50">次へ</button>
                    </div>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>

@endsection
