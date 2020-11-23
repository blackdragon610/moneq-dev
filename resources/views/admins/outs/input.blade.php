@extends('layouts/admin', ['pageType' => 1, 'isLayoutEdit' => true])


@section('main')

    <section class="content">

        <div class="box">
            <div class="box-body">

            @if (!empty($id))
                {{Form::open(['url'=> route('admin.post.update', $id),'method'=>'PUT', 'files' => true, 'id' => 'form'])}}
            @else
                {{Form::open(['url'=> route('admin.post.store'),'method'=>'POST', 'files' => true, 'id' => 'form'])}}
            @endif

            @include('layouts.parts.editor.hidden', ["type" => "text", 'name' => 'id', 'contents' => 'class="form-control" placeholder=""'])
            @include('layouts.parts.editor.hidden', ["type" => "text", 'name' => 'user_id', 'contents' => 'class="form-control" placeholder=""'])


            @if (!empty($inputs->user))
                <div class="row mt">
                    <div class="col-sm-10">
                        <a href="{{route("admin.answer.index", ["post_id" => $inputs["id"]])}}" class="btn btn-block btn-primary">この相談の回答を見る</a>
                    </div>

                    <dl class="col-sm-offset-70 col-sm-10">
                        <dt>相談者</dt>
                        <dd>{{$inputs->user->nickname}}</dd>
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
                        相談のタイトル
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name', 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item">
                    <dt>
                        相談テーマ
                    </dt>
                    <dd>
                        <?php $Category = app("Category"); $categories = $Category->getSelectAll();?>
                        @include('layouts.parts.editor.select', ['name' => 'sub_category_id', "file" => $categories, "keyValue" => "",  'contents' => 'class="form-control"'])
                    </dd>
                </dl>

                <dl class="dl-item">
                    <dt>
                        相談内容
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.textarea', ['name' => 'body', 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>

                <dl class="dl-item">
                    <dt>
                        タグ(スペース区切り)
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'tags',  'contents' => 'class="form-control"'])
                    </dd>
                </dl>

                @if (empty($isConfirmation))
                    <div class="mt">
                        <div class="row">
                            <div class="col-xs-50 text-center">
                                <a href="{{route('admin.post.index')}}" class="btn btn-block btn-default" style="display:block;">一覧</a>
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
