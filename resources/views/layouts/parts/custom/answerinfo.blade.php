<article>

    <div class="col-3 pt-2">
        <a style="width:30px;height:30px;" href="{{route('expert.detail', $contents->id)}}">
            <img src="http://placehold.it/50x50?text=P" alt="">
        </a>
    </div>
    <div class="col-9 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <p class="font-weight-bold mb-0">{{$contents->expert_name_second}}</p>
                </div>
                <div class="row">
                <span>回答数 : {{$contents->amount}}</span>
                </div>
            </div>
    </div>
</article>
