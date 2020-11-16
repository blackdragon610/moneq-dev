{{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    @include('layouts.parts.editor.checkbox', ['name' => 'trouble', "file" => configJson("custom/trouble"), "keyValue" => "", 'contents' => ''])<br /><br />

    @include('layouts.parts.editor.select', ['name' => 'income', "file" => configJson("custom/income"), "keyValue" => "", 'contents' => ''])<br /><br />

    @include('layouts.parts.editor.checkbox', ['name' => 'family', "file" => configJson("custom/family"), "keyValue" => "", 'contents' => ''])<br /><br />

    @include('layouts.parts.editor.select', ['name' => 'live', "file" => configJson("custom/live"), "keyValue" => "", 'contents' => ''])<br /><br />

<br />

    <br />

    <button>次へ</button>
{{Form::close()}}

{{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
    <button>入力をスキップする</button>
{{Form::close()}}
