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



            <h2 class="title2">一覧({{$post->post_name}})</h2>

            <div class="btn">
              <span class="attention">{{$lists->total()}}件</span>&nbsp;が該当しました。
            </div>

            <div class="mt-lg text-center">
                @include('layouts.parts.navi')
            </div>


            <table class="table mt">
                <tr class="tr">
                    <th class="th">ID{!! viewSort("post_answers.id") !!}</th>

                    <th class="th">
                        回答者{!! viewSort("experts.expert_name_second") !!}
                    </th>
                    <th class="th">
                        回答{!! viewSort("post_answers.body") !!}
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
                        {{out($list->body, 100)}}
                    </td>


                    <td class="td text-center" style="width:200px;" nowrap="nowrap">
                        <a class="btn btn-success" href="{{route('admin.answer.edit', $list['id'])}}">編集</a>&nbsp;
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
