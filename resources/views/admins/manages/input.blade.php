@extends('layouts/admin', ['pageType' => 1, 'isLayoutEdit' => true])


@section('main')

    <section class="content">

        <div class="box">
            <div class="box-body">

            @if (!empty($id))
                {{Form::open(['url'=> route('admin.manage.update', $id),'method'=>'PUT', 'files' => true, 'id' => 'form'])}}
            @else
                {{Form::open(['url'=> route('admin.manage.store'),'method'=>'POST', 'files' => true, 'id' => 'form'])}}
            @endif

            @include('layouts.parts.editor.hidden', ["type" => "text", 'name' => 'id', 'contents' => 'class="form-control" placeholder=""'])



            <div class="mt">
                <table class="table table-input mt">

                    <tr class="tr">
                        <th class="th">氏名</th>
                        <td class="td">
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'admin_name', 'contents' => 'class="form-control" placeholder=""'])
                        </td>
                        <th class="th">メールアドレス</th>
                        <td class="td">
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'email', 'contents' => 'class="form-control" placeholder=""'])
                        </td>
                    </tr>


                    <tr class="tr">
                        <th class="th">ログインID</th>
                        <td class="td">
                            @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'login_id', 'contents' => 'class="form-control" placeholder=""'])
                        </td>
                        <th class="th">パスワード</th>
                        <td class="td">
                            @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder=""'])
                        </td>
                    </tr>
                </table>


                @if (empty($isConfirmation))
                    <div class="mt-lg">
                        <div class="row">
                            <div class="col-xs-50 text-center">
                                <a href="{{route('admin.manage.index')}}" class="btn btn-block btn-default" style="display:block;">一覧</a>
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
