<div class="container-fluid bg-white" style="border:1px solid #dbdbdb; padding: 10px;">

    <div class="col-3 p-0">
        <a href="{{route('expert.detail', $contents->id)}}">
            <img src="/images/svg/user.svg">
        </a>
    </div>
    <div class="col-9 pt-2">
            <p class="title-14px">{{$contents->expert_name_second}}</p>
            <span class="label-12px" style="color:#9B9B9B">回答数 : {{$contents->amount}} </span>
    </div>
</div>

