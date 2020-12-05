<article class="col-12" style="border:1px solid #dbdbdb">

    <div class="row">
        <div id="userinfo" class="row container-fluid" style="border:0px !important">
            <img src="/images/img-avatar-sample.png" style="width:100px;height:100px;margin-top:30px;margin-left:30px">
            <div id="content">
                <span id="name">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">CFP®、住宅ローンアドバイザー</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">{{$contents->count_answer}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{$contents->date_birth.'/'.$contents->gender}}</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">{{$contents->count_useful}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{$contents->prefecture_area}}</span>
            </div>
        </div>
    </div>

    <div class="row" style="min-height:100px;margin-top:20px;margin-left:30px">
        <p class="label-14px">{{$contents->body}}</p>
    </div>

    <p class="title-16px" style="margin-top:20px;margin-left:30px;margin-bottom:8px">専門家プロフィール</p>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">保有資格</p>
        <p class="col-9 label-14px text-center">CFP®、住宅ローンアドバイザー</p>
    </div>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">得意分野</p>
        <p class="col-9 label-14px text-center">
            <span class="btn-tag-brown">保険</span>
            <span class="btn-tag-brown">ライフプラン・家計相談</span>
        </p>
    </div>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">業歴</p>
        <p class="col-9 label-14px text-center">2年4ヶ月</p>
    </div>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">住所地</p>
        <p class="col-9 label-14px text-center">東京都豊島区</p>
    </div>

    <p class="title-16px" style="margin-top:20px;margin-left:30px;margin-bottom:8px">個別相談</p>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">対応分野</p>
        <p class="col-9 label-14px text-center">
            <span class="btn-tag-brown">保険</span>
            <span class="btn-tag-brown">ライフプラン・家計相談</span>
        </p>
    </div>
    <div class="row" style="margin-top:12px">
        <p class="col-3 title-14px text-right">対応エリア</p>
        <p class="col-9 label-14px text-center">東京都</p>
    </div>


</article>
