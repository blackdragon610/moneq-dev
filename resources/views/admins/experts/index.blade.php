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

            {{Form::open(['url'=> route('admin.expert.index'),'method'=>'GET', 'files' => true, 'id' => 'form'])}}
                <div class="row">
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name', 'contents' => 'class="form-control", placeholder="氏名"'])
                    </div>
                    <div class="col-sm-32">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'count_answer_from', 'contents' => 'class="form-control", placeholder="回答数From"'])
                    </div>
                    <div class="col-sm-2" style="line-height:2.5em;">
                        〜
                    </div>
                    <div class="col-sm-32">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'count_answer_to', 'contents' => 'class="form-control", placeholder="回答数To"'])
                    </div>

                </div>
                <div class="mt-lg text-center">
                    <button class="btn btn-lg btn-primary" style="width:200px;">検索</button>
                </div>
            {{Form::close()}}

            <div class="row mt-lg">
                <dl class="col-sm-13 text-center">
                    <dt style="font-size:150%;">
                        回答数
                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_answer)}}件
                    </dd>
                </dl>

                <dl class="col-sm-13 text-center">
                    <dt style="font-size:150%;">
                        回答ページ閲覧
                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_access)}}PV
                    </dd>
                </dl>

                <dl class="col-sm-15 text-center">
                    <dt style="font-size:150%;">
                        プロフィール閲覧
                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_page_access)}}PV
                    </dd>
                </dl>

                <dl class="col-sm-15 text-center">
                    <dt style="font-size:150%;">
                        個別相談

                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_message)}}件
                    </dd>
                </dl>

                <dl class="col-sm-15 text-center">
                    <dt style="font-size:150%;">
                        紹介人数
                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_introduction)}}人
                    </dd>
                </dl>

                <dl class="col-sm-15 text-center">
                    <dt style="font-size:150%;">
                        紹介報酬残高
                    </dt>
                    <dd class="text-primary" style="font-size:200%;">
                        {{number_format($total->count_introduction_money)}}円
                    </dd>
                </dl>
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
                    <th class="th text-center">ID{!! viewSort("experts.id") !!}</th>

                    <th class="th text-center">
                        専門家{!! viewSort("experts.expert_name_kana_second") !!}
                    </th>
                    <th class="th text-center">
                        回答数{!! viewSort("count_answer") !!}
                    </th>
                    <th class="th text-center">
                        回答ページ<br />閲覧数{!! viewSort("count_access") !!}
                    </th>
                    <th class="th text-center">
                        プロフィールページ<br />閲覧数{!! viewSort("count_page_access") !!}
                    </th>
                    <th class="th text-center">
                        個別<br />相談数{!! viewSort("count_message") !!}
                    </th>
                    <th class="th text-center">
                        紹介数{!! viewSort("count_introduction") !!}
                    </th>
                    <th class="th text-center">
                        紹介報酬残高{!! viewSort("count_introduction_money") !!}
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
                        {{$list->expertName()}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_answer)}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_access)}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_page_access)}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_message)}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_introduction)}}
                    </td>
                    <td class="td">
                        {{number_format($list->count_introduction_money)}}円
                    </td>

                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-default" href="{{route('admin.expert.edit', $list['id'])}}">相談</a>&nbsp;
                        {{Form::open(['route'=>['admin.expert.destroy',$list['id']],'method'=>'DELETE', 'class' => 'inline-block  destory'])}}

                        <a class="btn btn-success" href="{{route('admin.expert.edit', $list['id'])}}">編集</a>&nbsp;
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
