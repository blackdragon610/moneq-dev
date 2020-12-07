@extends('layouts/admin', ['pageType' => 1, 'isLayoutEdit' => true])


@section('main')

    <section class="content">

        <div class="box">
            <div class="box-body">

            @if (!empty($id))
                {{Form::open(['url'=> route('admin.user.update', $id),'method'=>'PUT', 'files' => true, 'id' => 'form'])}}
            @else
                {{Form::open(['url'=> route('admin.user.store'),'method'=>'POST', 'files' => true, 'id' => 'form'])}}
            @endif

            @include('layouts.parts.editor.hidden', ["type" => "text", 'name' => 'id', 'contents' => 'class="form-control" placeholder=""'])


            @if (!empty($inputs["pay_status"]))
                <div class="row mt">
                    <dl class="col-sm-offset-80 col-sm-10">
                        <dt>会員状況</dt>
                        <dd>{{configJson("status_user")[$inputs["pay_status"]]}}</dd>
                    </dl>
                    <dl class="col-sm-10">
                        <dt>登録日時</dt>
                        <dd>{{dateDefault("date", $inputs["created_at"])}}</dd>
                    </dl>
                </div>
            @endif

            <div class="mt">
                <dl class="dl-item">
                    <dt>
                        メールアドレス
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>
                        ニックネーム
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>
                        性別
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.select', ["type" => "text", 'name' => 'gender', "file" => configJson("gender"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>
                        生年月日
                    </dt>
                    <dd>
                        <div class="row">
                            <div class="col-sm-33">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_year', "file" => config("custom.years"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </div>
                            <div class="col-sm-33">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_month', "file" => configJson("months"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </div>
                            <div class="col-sm-33">
                                @include('layouts.parts.editor.select', ['name' => 'date_birth_day', "file" => configJson("days"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </div>
                        </div>
                    </dd>
                </dl>

                <div class="row">
                    <div class="col-sm-50">
                        <dl class="dl-item">
                            <dt>
                                お住まいの都道府県
                            </dt>
                            <dd>
                                @include('layouts.parts.editor.select', [ 'name' => 'prefecture', "file" => configJson("prefecture"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </dd>
                        </dl>
                    </div>

                    <div class="col-sm-50">
                        <dl class="dl-item">
                            <dt>
                                職業
                            </dt>
                            <dd>
                                @include('layouts.parts.editor.select', [ 'name' => 'job', "file" => configJson("job"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </dd>
                        </dl>
                    </div>

                    <div class="col-sm-50">
                        <dl class="dl-item">
                            <dt>
                                婚姻状況
                            </dt>
                            <dd>
                                @include('layouts.parts.editor.select', [ 'name' => 'marriage', "file" => configJson("marriage"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </dd>
                        </dl>
                    </div>

                    <div class="col-sm-50">
                        <dl class="dl-item">
                            <dt>
                                子供
                            </dt>
                            <dd>
                                @include('layouts.parts.editor.select', [ 'name' => 'child', "file" => configJson("child"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                            </dd>
                        </dl>
                    </div>
                </div>

                <h2 class="title">追加質問</h2>

                <dl class="dl-item mt">
                    <dt>お金についての悩みはありますか？</dt>
                    <dd class="checkbox-label">
                        @include('layouts.parts.editor.checkbox', [ 'name' => 'trouble', "file" => configJson("trouble"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>世帯収入</dt>
                    <dd class="checkbox-label">
                        @include('layouts.parts.editor.select', [ 'name' => 'income', "file" => configJson("income"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>家族構成</dt>
                    <dd class="checkbox-label">
                        @include('layouts.parts.editor.checkbox', [ 'name' => 'family', "file" => configJson("family"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item mt">
                    <dt>住まい</dt>
                    <dd class="checkbox-label">
                        @include('layouts.parts.editor.checkbox', [ 'name' => 'live', "file" => configJson("live"), "keyValue" =>"", 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                @if (empty($isConfirmation))
                    <div class="mt">
                        <div class="row">
                            <div class="col-xs-50 text-center">
                                <a href="{{route('admin.user.index')}}" class="btn btn-block btn-default" style="display:block;">一覧</a>
                            </div>

                            <div class="col-xs-50 text-center">
                                <button class="btn btn-block btn-primary">@if (!empty($id))編集@else登録@endif</button>
                            </div>
                        </div>

                    </div>
                @else

                    <div class="row mt">
                        <div class="col-xs-50 text-center">
                            {!! Form::submit('修正', ['class' => 'btn btn-block btn-default', 'name' => 'reInput']) !!}
                        </div>
                        <div class="col-xs-50 text-center">
                            {!! Form::submit('確定', ['class' => 'btn btn-block btn-primary', 'name' => 'end']) !!}
                        </div>
                    </div>

                @endif
                {{Form::close()}}
            </div>
</section>




@endsection
