<article class="col-12 p-1">
    <div class="row">
        <div class="col-sm-2 col-lg-1 pt-2">
            <img src="http://placehold.it/50x50?text=P" alt="">
        </div>
        <div class="col-sm-10 col-lg-4 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="font-weight-bold">{{$contents->expert_name_first.$contents->expert_name_second}}さん</h5>
                    <p>({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</p>
                </div>
                <div class="row">
                    <span class="age">{{getEra($contents->date_birth).'/'.$gender[$contents->gender]}}</span>
                    <span class="address">{{$pre[$contents->prefecture_area]}}</span>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 pt-2">
            <div class="container-fluid">
                <div class="row pb-lg-1">
                    <h6 class="mright font-weight-bold">回答数</h6>
                    <span>{{$contents->amount}}件</span>
                </div>
                <div class="row">
                    <span class="mright font-weight-bold">役に立った</span>
                    <span >{{$contents->hAmount}}件</span>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-lg-4 pt-2">
            <div class="container-fluid pl-0 pb-lg-1">
                <h6 class="font-weight-bold">保有資格</h6>
                <span class="mright keepTwoLine">{{$spec[$contents->specialtie_id]}}</span>
            </div>
        </div>
    </div>
</article>
