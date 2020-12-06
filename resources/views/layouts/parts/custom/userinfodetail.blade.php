<article class="col-12 p-1">
    <div class="row">
        <div class="col-sm-2 col-lg-1 pt-2">
            <img src="http://placehold.it/50x50?text=P" alt="">
        </div>
        <div class="col-sm-10 col-lg-4 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="font-weight-bold">{{$contents->expert_name_first.$contents->expert_name_second}}</h5>
                    <p>({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</p>
                </div>
                <div class="row">
                    <span class="age">{{$contents->date_birth.'/'.$contents->gender}}</span>
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
                <span class="mright keepTwoLine"></span>
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
                        <h5><b>「個別相談」対応分野</b></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span>{{$contents->specialtie->specialtie_name}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <h5><b>「個別相談」対応エリア</b></h5>
                    </div>
                </div>
                    <div class="row">
                    <div class="col text-center">
                        <span>{{$contents->prefecture_area}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-3">
        <div class='text-center'>
            <a class="btnSubmit" href='{{route('expert.message', $contents->id)}}' class='pb-3'>テスト太郎さんへ個別相談・問い合わせ</a>
        </div>
        <div class="row">
            <div class="col text-center btnLayer">
                <div class="container">
                    <div class="col text-center">
                        <p>※個別相談は、当サービスの利用料金とは別の費用が発生する可能性があります。詳しくは専門家にお問い合わせください。
                            <a href="#" class="text-dark"><u>利用規約</u></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>
