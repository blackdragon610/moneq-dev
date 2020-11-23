@extends('layouts/admin', ['pageType' => 1, 'isLayoutList' => true])

@section('header')
	@parent
@endsection

@section('main')


  <section class="content">
    <div class="box">
      <div class="box-body">
		<div class="mt">
			@include('layouts.parts.message')

            <h2 class="title2">検索</h2>

            {{Form::open(['url'=> route('admin.user.index'),'method'=>'GET', 'files' => true, 'id' => 'form'])}}
                <div class="row">
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', 'contents' => 'class="form-control", placeholder="ニックネーム"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.select', ["type" => "text", 'name' => 'pay_status', "file" => configJson("status_user"), "keyValue" => "", "first" => "会員ステータス選択", 'contents' => 'class="form-control"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレス"'])
                    </div>
                </div>
                <div class="mt-lg text-center">
                    <button class="btn btn-lg btn-primary" style="width:200px;">検索</button>
                </div>
            {{Form::close()}}


            <h2 class="title2">一覧</h2>

            <div class="btn">
              <span class="attention">{{$lists->total()}}件</span>&nbsp;が該当しました。
            </div>

            <div class="mt-lg text-center">
                @include('layouts.parts.navi')
            </div>


            <table class="table mt">
                <tr class="tr">
                    <th class="th">ID{!! viewSort("users.id") !!}</th>

                    <th class="th">
                        ニックネーム{!! viewSort("users.nickname") !!}
                    </th>
                    <th class="th">
                        会員状態{!! viewSort("users.pay_status") !!}
                    </th>
                    <th class="th">
                        相談数
                    </th>
                    <th class="th">

                    </th>

                </tr>

                @foreach ($lists as $list)
                <tr class="tr">
                    <td class="td" style="width:1px;">
                        {{$list->id}}
                    </td>
                    <td class="td">
                        {{$list->nickname}}
                    </td>
                    <td class="td">
                        {{configJson("status_user")[$list->pay_status]}}
                    </td>
                    <td class="td">
                        {{$list->countPost()}}
                    </td>
                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-default" href="{{route('admin.user.edit', $list['id'])}}">相談</a>&nbsp;
                        {{Form::open(['route'=>['admin.user.destroy',$list['id']],'method'=>'DELETE', 'class' => 'inline-block  destory'])}}

                        <a class="btn btn-success" href="{{route('admin.user.edit', $list['id'])}}">編集</a>&nbsp;
                        {{Form::open(['route'=>['admin.introduction.destroy',$list['id']],'method'=>'DELETE', 'class' => 'inline-block  destory', "onsubmit" => "return onDelete();"])}}
                        <button type="submit" class="ml btn btn-danger destory">削除</button>
                        {{Form::close()}}

                    </td>

                </tr>
                @endforeach
            </table>


            <div class="mt text-center">
                @include('layouts.parts.navi')
            </div>
        </div>

</div>
@endsection
