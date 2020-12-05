<article style="border:1px solid #dbdbdb">

    <div class="col-3 p-0">
        <a href="{{route('expert.detail', $contents->id)}}">
            <img src="/images/img-avatar-sample.png" style="width:60px !important;height:60px !important">
        </a>
    </div>
    <div class="col-9 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <p class="font-weight-bold mb-0">{{$contents->expert_name_second}}</p>
                </div>
                <div class="row">
                <span>回答数 : {{$contents->amount}} </span>
                </div>
            </div>
    </div>
</article>

