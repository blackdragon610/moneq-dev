<a href="{{route('expert.detail', $contents->id)}}" class="btn">
<article class="col-12 p-1">
    <div class="row">
        <div class="col-sm-2 col-lg-1 pt-2">
            <img src="/images/img-avatar-sample.png" alt="">
        </div>
        <div class="col-sm-10 col-lg-4 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="font-weight-bold">{{$contents->expert_name_first.$contents->expert_name_second}}</h5>
                    <p>({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</p>
                </div>
                <div class="row">
                    <span class="age">{{getDateTFormat($contents->date_start)}}より業務開始-</span>
                    <span class="address">{{$prefecture[$contents->prefecture_area]}}</span>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 pt-2">
            <div class="container-fluid">
                <div class="row pb-lg-1">
                    <h6 class="mright font-weight-bold">回答数</h6>
                    <span>{{$contents->count_answer}}件</span>
                </div>
                <div class="row">
                    <span class="mright font-weight-bold">役に立った</span>
                    <span >{{$contents->count_useful}}件</span>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-lg-4 pt-2">
            <div class="container-fluid pl-0 pb-lg-1">
                <h6 class="font-weight-bold">保有資格</h6>
                <span class="mright keepTwoLine">{{$contents->specialtie->specialtie_name}}</span>
            </div>
        </div>
    </div>
    <div class="row pl-3">
        <p>{{$contents->body}}</p>
    </div>
    <div class="row pl-3">
        <div class="col-12 col-sm-6">

            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <a href="" class="btnBlue">{{$contents->specialtie->specialtie_name}}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</article>
</a>
