<article class="col-12" style="border:1px solid #dbdbdb">

    <div class="row">
        <div id="userinfo" class="row container-fluid" style="border:0px !important">
            <img src="/images/img-avatar-sample.png" style="width:100px;height:100px;margin-top:30px;margin-left:30px">
            <div id="content">
                <span id="name">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">{{$contents->expert_name_kana_first.$contents->expert_name_kana_second}}</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">
                    @foreach($license as $item)
                        {{$item->body.' '}}
                    @endforeach
                </span>
                <span id="card" style="margin-left:60px"><img class="expert-sub-icon" src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">{{$contents->count_answer}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{$contents->date_birth.'/'.$contents->gender}}</span>
                <span id="card" style="margin-left:60px"><img class="expert-sub-icon" src="/images/svg/check-solid.svg">解決済み：<span id="number">{{$contents->count_useful}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{$contents->prefecture_area}}</span>
            </div>
        </div>
    </div>

    <div class="row" style="min-height:100px;margin-top:20px;margin-left:30px">
        <p class="label-14px">{{$contents->body}}</p>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-4 p-0"><p class="title-16px">専門家プロフィール</p></div>
          <div class="col-8"></div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">保有資格</p></div>

          <div class="col-8">
            <p class="label-14px pt-2">
                @foreach($license as $item)
                    {{$item->body.' '}}
                @endforeach
            </p>
          </div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">得意分野</p></div>
          <div class="col-8 pt-1">
                <span class="btn-tag-brown label-14px">{{$specialties[$contents->specialtie_id]}}</span>
          </div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">業歴</p></div>
          <div class="col-8"><p class="label-14px pt-2">{{getStartDate($contents->date_start)}}</p></div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">住所地</p></div>
          <div class="col-8"><p class="label-14px pt-2">{{$contents->prefecture_area}}</p></div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
          <div class="col-4 p-0"><p class="title-16px">個別相談</p></div>
          <div class="col-8"></div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">得意分野</p></div>
          <div class="col-8 pt-1">
            <span class="btn-tag-brown label-14px">{{$specialties[$contents->specialtie_id]}}</span>
          </div>
          <div class="w-100"></div>
          <div class="col-4 text-center grid-color pt-2"><p class="title-14px">対応エリア</p></div>
          <div class="col-8"><p class="label-14px pt-2">{{$contents->prefecture_area}}</p></div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <a href="{{url('expert/message').'/'.$contents->id}}" class="btn modal-btn-304-50 ml-0">テスト太郎さんへ個別相談・問い合わせ</a>
    </div>

    <div class="mt-2 text-center">
        <p id="important" class="mb-1">※個別相談は、当サービスの利用料金とは別の費用が発生する可能性があります。</p>
        <p id="important">詳しくは専門家にお問い合わせください。利用規約</p>
    </div>

</article>
