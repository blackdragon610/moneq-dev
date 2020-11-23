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

            <h2 class="title2">一覧</h2>

            <div class="text-right">
                <a href="{{route("admin.manage.create")}}" class="btn btn-primary">新規登録</a>
            </div>
            <div class="btn">
              <span class="attention">{{$lists->total()}}件</span>&nbsp;が該当しました。
            </div>

            <div class="mt-lg text-center">
                @include('layouts.parts.navi')
            </div>


            <table class="table mt">
                <tr class="tr">
                    <th class="th">ID</th>

                    <th class="th">
                        氏名
                    </th>
                    <th class="th">
                        ログインID
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
                        {{$list->admin_name}}
                    </td>
                    <td class="td">
                        {{$list->login_id}}
                    </td>
                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-success" href="{{route('admin.manage.edit', $list['id'])}}">編集</a>&nbsp;
                        {{Form::open(['route'=>['admin.manage.destroy',$list['id']],'method'=>'DELETE', 'class' => 'inline-block  destory'])}}
                        <a class="ml btn btn-danger destory" href="#" target="{{route('admin.manage.destroy', $list['id'])}}?_method=delete">削除</a>
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
