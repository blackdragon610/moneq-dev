<a href="{{route('expert.detail', $contents->id)}}" style="color:#221815">
<article class="col-12 pl-0 pr-0">
    <div id="userinfo" class="container-fluid">
        <div class="row">
            <img src="{{getImage("experts", $contents->image, "Thum")}}" id="avatar">
            <div id="content">
                <span id="name0">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">{{$contents->expert_name_kana_first.$contents->expert_name_kana_second}}</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">
                </span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">{{$contents->count_answer}}</span>件</span>
                <br/>
                <span id="card" style="color:#221815;width:230px;display:inline-block">{{getEra($contents->date_birth).'/'.$gender[$contents->gender]}}</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">{{$contents->count_useful}}</span>件</span>
                <br/>
                <span id="card" style="color:#221815">{{$prefecture[$contents->prefecture_area]}}</span>
                <br/>
            </div>
        </div>

        <div class="row" style="margin-left:24px;margin-top:12px;margin-right:24px;word-break:break-word;margin-bottom:12px">
            <p>{{$contents->body}}</p>
        </div>

        <div class="row pl-3" style="margin-bottom:24px">
            <div class="col-12">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <span class="btnBlue">{{$contents->specialtie->specialtie_name}}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</article>
</a>
