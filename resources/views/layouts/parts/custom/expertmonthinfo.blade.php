<a href="{{route('expert.detail', $contents->id)}}">
<article class="col-12 p-1">
    <div class="row">
        @if (isset($ranking))
            <img src="/images/svg/img-ranking-{{ $ranking }}.svg" class="ranking">
        @endif

        <div id="userinfo" class="row container-fluid">
            @if($contents->image)
                <img src="{{$contents->image}}" id="avatar">
            @else
                <img src="/images/img-avatar-sample.png" id="avatar"/>
            @endif
            <div id="content">
                <span id="name0">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">{{$contents->expert_name_kana_first.$contents->expert_name_kana_second}}</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">
                    @foreach($contents->getCategoryByExpertId() as $item)
                        {{$item->body.' '}}
                    @endforeach
                </span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">{{$contents->amount}}</span>件</span>
                <br/>
                <span id="card" style="color:#221815;width:230px;display:inline-block">{{getEra($contents->date_birth).'/'.$gender[$contents->gender]}}</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">{{$contents->hAmount}}</span>件</span>
                <br/>
                <span id="card" style="color:#221815">{{$pre[$contents->prefecture_area]}}</span>
                <br/>
            </div>
        </div>
    </div>
</article>
</a>
