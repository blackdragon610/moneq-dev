@extends('layouts/admin', ['pageType' => 1, 'isLayoutList' => true])

@section('header')
	@parent

    <script>
        function changeStatus(my)
        {
            $.ajax({
                type: "get",
                url: "/admin/post/" + $(my).attr("target") + "/status/",
                data: {status:$(my).val()},
                success: function(msg){

                }
            })
        }

    </script>
@endsection

@section('main')


  <section class="content">
    <div class="box">
      <div class="box-body">
		<div class="mt">
			@include('layouts.parts.message')

            <h2 class="title2">検索</h2>

            {{Form::open(['url'=> route('admin.post.index'),'method'=>'GET', 'files' => true, 'id' => 'form'])}}
                <div class="row">
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', 'contents' => 'class="form-control", placeholder="相談者"'])
                    </div>
                    <div class="col-sm-33">
                        <?php $Category = app("Category"); $categories = $Category->getSelectAll();?>
                        @include('layouts.parts.editor.select', ['name' => 'sub_category_id', "file" => $categories, "keyValue" => "", "first" => "カテゴリ選択", 'contents' => 'class="form-control"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'post_name', 'contents' => 'class="form-control" placeholder="タイトル"'])
                    </div>
                    <div class="col-sm-33 mt">
                        @include('layouts.parts.editor.select', ['name' => 'status', "file" => configJson("status_post"), "keyValue" => "", "first" => "回答ステータス選択", 'contents' => 'class="form-control"'])
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
                    <th class="th">ID{!! viewSort("posts.id") !!}</th>

                    <th class="th">
                        投稿日時{!! viewSort("posts.created") !!}
                    </th>
                    <th class="th">
                        相談者{!! viewSort("users.id") !!}
                    </th>
                    <th class="th">
                        カテゴリ{!! viewSort("posts.sub_category_id") !!}
                    </th>
                    <th class="th">
                        ステータス{!! viewSort("posts.status") !!}
                    </th>
                    <th class="th">
                        タイトル{!! viewSort("posts.post_name") !!}
                    </th>
                    <th class="th">
                        公開状況{!! viewSort("posts.status") !!}
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
                        {{dateDefault("date", $list->created_at)}}
                    </td>
                    <td class="td">
                        {{$list->user->nickname}}
                    </td>
                    <td class="td">
                        {{$list->sub_category->sub_name}}
                    </td>
                    <td class="td">
                        {{configJson("status_post")[$list->status]}}
                    </td>
                    <td class="td">
                        {{$list->post_name}}
                    </td>
                    <td class="td" style="width:7em;>
                        <select class="form-control" target="{{$list->id}}" onchange="changeStatus(this)">
                        @foreach (configJson("openclose") as $key => $value)
                           <option value="{{$key}}"@if ($list->is_open == $key) selected @endif>{{$value}}</option>
                        @endforeach
                        </select>
                    </td>
                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-default" href="{{route('admin.answer.index', ["post_id" => $list['id']])}}">回答</a>&nbsp;
                        <a class="btn btn-success" href="{{route('admin.post.edit', $list['id'])}}">編集</a>&nbsp;
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
