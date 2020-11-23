@extends('layouts/admin', ['pageType' => 1, 'isLayoutList' => true])

@section('header')
	@parent

    <script>
        function changeStatus(my)
        {
            $.ajax({
                type: "get",
                url: "/admin/out/" + $(my).attr("target") + "/status/",
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

            {{Form::open(['url'=> route('admin.out.index'),'method'=>'GET', 'files' => true, 'id' => 'form'])}}
                <div class="row">
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.select', ['name' => 'status', "file" => configJson("status_withdrawal"), "keyValue" => "", "first" => "振込状態の未選択", 'contents' => 'class="form-control"'])
                    </div>
                    <div class="col-sm-33">
                        @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'expert_name', 'contents' => 'class="form-control" placeholder="出金依頼者"'])
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
                        {{$list->expert->expertName()}}
                    </td>
                    <td class="td">
                        <select class="form-control" target="{{$list->id}}" onchange="changeStatus(this)">
                            @foreach (configJson("status_withdrawal") as $key => $value)
                                <option value="{{$key}}"@if ($list->status == $key) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="td">
                        {{$list->expert->bank_name}}({{$list->expert->bank_code}})
                        {{$list->expert->branch_name}}({{$list->expert->branch_code}})
                        {{configJson("bank_type")[$list->expert->bank_type]}}
                        {{$list->expert->bank_number}}
                        {{$list->expert->bank_person_name}}
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
