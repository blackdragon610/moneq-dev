<div class="container-fluid bg-white" style="border:1px solid #dbdbdb; padding: 10px;">

    <div class="col-3 p-0">
        <a href="{{route('expert.detail', $contents->id)}}">
            <img src="/images/img-avatar-sample.png">
        </a>
    </div>
    <div class="col-9 pt-2">
            <p class="font-weight-bold mb-0">{{$contents->expert_name_second}}</p>
            <span>回答数 : {{$contents->amount}} </span>
    </div>
</div>

