@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 col-lg-12 bg-white">
                <h5 class="font-weight-bold p-2">追加質問</h5>
                <hr class="mt-2 mb-3"/>


{{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    <label for="" class="font-weight-bold">お金についての悩みはありますか？</label><span class="text-danger">(複数選択)</span><br/>
    @include('layouts.parts.editor.checkboxext', ['name' => 'trouble', "file" => configJson("custom/trouble"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])<br />

    <label for="" class="font-weight-bold">世帯収入</label>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            @include('layouts.parts.editor.select', ['name' => 'income', "file" => configJson("custom/income"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
        </div>
    </div>

    <label for="" class="font-weight-bold">家族構成</label><span class="text-danger">(複数選択)</span><br/>
    @include('layouts.parts.editor.checkboxext', ['name' => 'family', "file" => configJson("custom/family"), "keyValue" => "", 'contents' => 'class="checkboxHidden"'])<br />

    <label for="" class="font-weight-bold">住まい</label>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            @include('layouts.parts.editor.select', ['name' => 'live', "file" => configJson("custom/live"), "keyValue" => "", 'contents' => 'class="form-control"'])<br />
        </div>
    </div>

    <button class="btnSubmit">次へ</button>
{{Form::close()}}

{{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
    <button class="btnSubmit">入力をスキップする</button>
{{Form::close()}}

            </div>
        </div>
    </div>
</div>

@endsection
