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

            {{Form::open(['url'=> route('admin.introduction.index'),'method'=>'GET', 'files' => true, 'id' => 'form'])}}
                <div class="row">
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name', 'contents' => 'class="form-control", placeholder="紹介者"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'nickname', "file" => configJson("status_user"), "keyValue" => "", 'contents' => 'placeholder="紹介された人" class="form-control"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "date", "name" => "date_start", 'contents' => 'style="width:10em";class="form-control" placeholder="紹介日From"'])
                        〜
                        @include('layouts.parts.editor.text', ["type" => "date", "name" => "date_end", 'contents' => 'style="width:10em";class="form-control" placeholder="紹介日To"'])
                    </div>
                </div>
                <div class="mt-lg text-center">
                    <button class="btn btn-lg btn-primary" style="width:200px;">検索</button>
                </div>
            {{Form::close()}}


            <h2 class="title2">検出したデータでの金額</h2>

            <div class="row mt">
                <div class="col-sm-33">
                    <dl class="dl-item text-center">
                        <dt>総金額</dt>
                        <dd>{{number_format($total["total"]->total)}}円</dd>
                    </dl>
                </div>
                <div class="col-sm-33">
                    <dl class="dl-item text-center">
                        <dt>今月金額</dt>
                        <dd>{{number_format($total["month"]->total)}}円</dd>
                    </dl>
                </div>
                <div class="col-sm-33">
                    <dl class="dl-item text-center">
                        <dt>本日金額</dt>
                        <dd>{{number_format($total["day"]->total)}}円</dd>
                    </dl>
                </div>
            </div>


            <h2 class="title2">一覧</h2>

            <div class="btn">
              <span class="attention">{{$lists->total()}}件</span>&nbsp;が該当しました。
            </div>

            <div class="mt-lg text-center">
                @include('layouts.parts.navi')
            </div>


            <table class="table mt">
                <tr class="tr">
                    <th class="th">ID{!! viewSort("expert_introductions.id") !!}</th>
                    <th class="th">
                        紹介者{!! viewSort("experts.expert_name_second") !!}
                    </th>
                    <th class="th">
                        紹介された{!! viewSort("users.nickname") !!}
                    </th>
                    <th class="th">
                        紹介料{!! viewSort("expert_introductions.money") !!}
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
                        {{$list->expert->expertName()}}
                    </td>
                    <td class="td">
                        {{$list->user->nickname}}
                    </td>
                    <td class="td">
                        {{number_format($list->money)}}円
                    </td>
                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-success" href="{{route('admin.introduction.edit', $list['id'])}}">編集</a>&nbsp;

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
