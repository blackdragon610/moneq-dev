{{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}

    @include('layouts.parts.editor.radio', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => ''])<br />

    @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("funcs.years"), "keyValue" => "", 'contents' => ''])年
    @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => ''])月
    @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => ''])日
    <br />
    <br />

    @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => ''])
    <br />
    <br />


    @include('layouts.parts.editor.select', ['name' => 'job', "file" => configJson("custom/job"), "keyValue" => "", 'contents' => ''])

<br />
<br />
    @include('layouts.parts.editor.select', ['name' => 'marriage', "file" => configJson("custom/marriage"), "keyValue" => "", 'contents' => ''])

<br />
<br />
@include('layouts.parts.editor.select', ['name' => 'child', "file" => configJson("custom/child"), "keyValue" => "", 'contents' => ''])


<br />

    <br />

    <button>次へ</button>
{{Form::close()}}
