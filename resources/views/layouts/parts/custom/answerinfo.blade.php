<div class="col-12">
    <div class="row" style="padding-left:15px">
        @if(isset($rank))
            @if($rank < 3)
                <img src="/images/svg/img-left-ranking-{{$i}}.svg" style="position:absolute">
            @endif
        @endif

        <div class="container-fluid bg-white" style="border:1px solid #dbdbdb; padding: 10px;">

            <div class="col-3 p-0">
              @if(isset($post))
                  <a href="{{route('expert.detail.post', [$contents->id, $post->id])}}">
              @else
                  <a href="{{route('expert.detail', $contents->id)}}">
              @endif
                    <img src="/images/img-avatar-sample.png">
                </a>
            </div>
            <div class="col-9 pt-2">
                    <p class="title-14px">{{$contents->expert_name_second}}</p>
                    <span class="label-12px" style="color:#9B9B9B">回答数 : {{$contents->amount}} </span>
            </div>
        </div>
  </div>
</div>
