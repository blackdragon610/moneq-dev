@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid" style="background-color:#fff9f2">
    <div class="container p-0 bg-white" id="row3">

        <div class="row" style="margin-top:50px;">

            @foreach($categories as $item)
                <div class="col-4 p-2" style="width:360px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【{{$item['name']}}】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            @foreach($item['groups'] as $key=>$sub)
                                <span><a href="{{route('search.category', ['keyword'=>$keyword, 'category'=>$key])}}" class="pr-3 text-dark">{{$sub}}</a></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
