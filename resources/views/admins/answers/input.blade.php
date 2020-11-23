@extends('layouts/admin', ['pageType' => 1, 'isLayoutEdit' => true])


@section('main')

    <section class="content">

        <div class="box">
            <div class="box-body">

            @if (!empty($id))
                {{Form::open(['url'=> route('admin.answer.update', $id),'method'=>'PUT', 'files' => true, 'id' => 'form'])}}
            @else
                {{Form::open(['url'=> route('admin.answer.store'),'method'=>'POST', 'files' => true, 'id' => 'form'])}}
            @endif

            @include('layouts.parts.editor.hidden', ["type" => "text", 'name' => 'id', 'contents' => 'class="form-control" placeholder=""'])


            <h2 class="subtitle">保険に関して相談の回答</h2>


            @if (!empty($inputs->expert))
                <div class="row mt">
                    <dl class="col-sm-offset-70 col-sm-10">
                        <dt>回答者</dt>
                        <dd>{{$inputs->expert->expertName()}}</dd>
                    </dl>
                    <dl class="col-sm-10">
                        <dt>作成日時</dt>
                        <dd>{{dateDefault("date", $inputs["created_at"])}}</dd>
                    </dl>
                </div>
            @endif

            <div class="mt">
                <dl class="dl-item">
                    <dt>
                        回答内容
                    </dt>
                    <dd>
                        @include('layouts.parts.editor.textarea', ['name' => 'body', 'contents' => 'class="form-control" placeholder=""'])
                    </dd>
                </dl>


                @if (empty($isConfirmation))
                    <div class="mt">
                        <div class="row">
                            <div class="col-xs-50 text-center">
                                <a href="{{route('admin.answer.index')}}" class="btn btn-block btn-default" style="display:block;">一覧</a>
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
