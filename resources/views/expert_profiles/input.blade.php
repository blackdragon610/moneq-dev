@extends('layouts/front', ["type" => 1])


@section('main')


    {{Form::open(['url'=> route('expert.profile.update'),'method'=>'POST', 'files' => true, 'id' => 'form'])}}

    氏名<br />

    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name_second', 'contents' => ''])<br />
    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name_first', 'contents' => ''])
    <br />
    氏名(ふりがな)<br />
    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name_kana_second', 'contents' => ''])
    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name_kana_first', 'contents' => ''])<br />
    <br />

    性別<br />
    @include('layouts.parts.editor.radio', ['name' => 'gender', "file" => configJson("custom/gender"), "keyValue" => "", 'contents' => ''])<br />

    生年月日
    @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("custom.years"), "keyValue" => "", 'contents' => ''])年
    @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => ''])月
    @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("custom/days"), "keyValue" => "", 'contents' => ''])日



    <br />
    <br />
    保有資格(必須)<br/>
    Todo
    <br />
    <br />

    業務開始年月<br />
    @include('layouts.parts.editor.select', ['name' => 'date_start_year', "file" => config("custom.years"), "keyValue" => "", 'contents' => ''])年
    @include('layouts.parts.editor.select', ['name' => 'date_start_month', "file" => configJson("custom/months"), "keyValue" => "", 'contents' => ''])月
    <br />
    <br />

    顔写真（300×300以上）<br />
    @include('layouts.parts.editor.file', ["type" => "image", 'name' => 'image', "uploadType" => getUploadType("Expert"), 'contents' => ''])

    <br />
    <br />
    対応エリア<br />
    @include('layouts.parts.editor.select', ['name' => 'prefecture_area', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => ''])
    <br />
    <br />

    対応可能分野<br />
    @include('layouts.parts.editor.checkbox', ['name' => 'specialties', "file" => getSelect("Specialtie"), "keyValue" => "", 'contents' => ''])


    <br />
    <br />
    得意分野<br />
    @include('layouts.parts.editor.select', ['name' => 'specialtie_id', "file" => getSelect("Specialtie"), "keyValue" => "", 'contents' => ''])

    <br />
    <br />
    自己紹介<br />
    @include('layouts.parts.editor.textarea', ['name' => 'body', 'contents' => ''])

    <br />
    <br />
    郵便番号<br />

    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'zip1', 'contents' => ''])-
    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'zip2', 'contents' => ''])
    <br />
    <br />

    都道府県<br />
    @include('layouts.parts.editor.select', ['name' => 'prefecture', "file" => configJson("custom/prefecture"), "keyValue" => "", 'contents' => ''])
    <br />
    <br />

    所在地<br />
    @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'address', 'contents' => ''])
    <br />
    <br />

    @if (!empty($isConfirmation))
        {!! Form::submit('修正', ['class' => 'btn btn-block btn-default', 'name' => 'reInput']) !!}
        {!! Form::submit('確定', ['class' => 'btn btn-block btn-primary', 'name' => 'end']) !!}
    @else
        <button>登録する</button>
    @endif
    {{Form::close()}}
@endsection
