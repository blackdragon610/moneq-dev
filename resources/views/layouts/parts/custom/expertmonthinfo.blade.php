<article class="col-12 p-1">
    <div class="row">
        @if (isset($ranking))
            <img src="/images/svg/img-ranking-{{ $ranking }}.svg" class="ranking">
        @endif

        <div id="userinfo" class="row container-fluid">
            <img src="/images/img-avatar-sample.png" id="avatar" class="avatar">
            <div id="content">
                <span id="name">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">CFP®、住宅ローンアドバイザー</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">{{$contents->amount}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{getEra($contents->date_birth).'/'.$gender[$contents->gender]}}</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">{{$contents->hAmount}}</span>件</span>
                <br/>
                <span>{{$pre[$contents->prefecture_area]}}</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">保有資格</span>
                <span class="mright keepTwoLine">{{$spec[$contents->specialtie_id]}}</span>
            </div>
        </div>
    </div>
</article>
