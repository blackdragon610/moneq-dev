@extends('layouts/front', ["type" => 1])


@section('main')
<header class="header">
    <div class="overlay">
    </div>
    <div class="description">
        <p id="heading1" class="m-0">お金の悩みを<span>「気軽に」</span></p>
        <p id="heading2" class="mt-0 mb-0">専門家に質問できる</p>
        <div id="static1">
            <p class="text-center">日本最大級のお金の悩み相談サービス</p>
        </div>
        <div id="static2">
        </div>
        <div class="input-group" id="searchbar">
            <input type="text" placeholder="お金の悩みを検索" >
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary">
                    <i class="fa fa-search fa-1x"></i>
                </button>
            </div>
        </div>
        <p id="heading3" class="mt-0 mb-0">\ さっそく、お金の悩みを専門家に相談する /</p>
        <div class="text-center">
            @if(Cookie::has('token'))
                <a href="{{route('post.create')}}" class="btn yellow-roundbtn" style="margin-top: 20px !important;">今すぐ登録して、専門家に相談する</a>
            @else
                <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 20px !important;">今すぐ登録して、専門家に相談する</a>
            @endif
        </div>
    </div>
</header>

<div class="sectionbar1">
    <div class="row">
        <div class="container">
            <div class="row align-items-center justify-content-center col-md-12" id="overview">
                <div class="overviewCard col-sm-2">
                    <div id="title">Q&amp;A</div>
                    <div class="inline-block">
                        <h1 id="number">14,054</h1>
                        <span id="unit">件</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">役に立った回答</div>
                    <div class="inline-block">
                        <h1 id="number">4,554</h1>
                        <span id="unit">件</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">回答率</div>
                    <div class="inline-block">
                        <h1 id="number">99.8</h1>
                        <span id="unit">件</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">協力専門家</div>
                    <div class="inline-block">
                        <h1 id="number">124</h1>
                        <span id="unit">人</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">会員数</div>
                    <div class="inline-block">
                        <h1 id="number">6,124</h1>
                        <span id="unit">人</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sectionbar2">
    <div class="container" id="row1">
        <div class="row justify-content-center">
            <p class="title">こんなお悩みありませんか？</p>
        </div>
    </div>
    <div class="container" id="row2">
        <div class="row align-items-end">
            <div class="col">
                <div style="width:208px;height:280px;border:0px">
                    <img src="/images/svg/img-problem-1.svg">
                    <p class="text1" style="padding-top:15px;">お金の悩みを相談できる人が周りにいない</p>
                </div>
            </div>
            <div class="col">
                <div style="width:243px;height:305px;border:0px">
                    <img src="/images/svg/img-problem-2.svg">
                    <p class="text2" style="margin-left:34px">専門家は相談料が高いし気軽に相談できない</p>
                </div>
            </div>
            <div class="col">
                <div style="width:278px;height:305px;border:0px">
                    <img src="/images/svg/img-problem-3.svg">
                    <p class="text1" style="margin-left:34px">誰が書いたかもわからないネットの情報は信用できない</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="row3">
        <div class="row justify-content-center">
            <img src="/images/svg/img-logo-137-36.svg"><p class="title2 mb-0 ml-2">がそのお悩みを解決します！</p>
            <p class="title2">低価格で使える<span class="bdyellow">お金の相談パートナー</span>です。</p>
        </div>
    </div>
</div>

<div class="sectionbar3">
    <div class="container" id="row1">
        <div class="row justify-content-center">
            <p class="title mb-0">日本最大級のお金の悩み相談サービス</p>
            <img src="/images/svg/img-logo-210-56.svg"><p class="title1">とは？</p>
        </div>
    </div>
    <div class="container" id="row2">
        <div class="row align-items-end">
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <button class="roundbtn">STEP 1</button>
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1">お金の相談をする</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-consult-1.svg">
                    <p id="tagline2">家計・貯蓄・保険・投資・相談・住宅ローン<br/>
                        などの「お金の相談」を<br/>
                        スマホ・パソコンから送信します。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <button class="roundbtn">STEP 2</button>
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1">専門家が回答する</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-consult-2.svg">
                    <p id="tagline2">「お金の相談」に対して<br/>
                    100名以上の複数の専門家（FP、税理士、<br/>
                    会計士…）が回答します。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <button class="roundbtn">STEP 3</button>
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1">悩みが解決する</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-consult-3.svg" style="margin-top:24px">
                    <p id="tagline2" style="margin-top:28px" >専門家からの回答で<br/>
                        お悩みが解決します。<br/>
                        追加質問や個別相談も可能です。</p>
                </article>
            </div>
        </div>

        <div class="text-center">
            @if(Cookie::has('token'))
                <a href="{{route('post.create')}}" class="btn yellow-roundbtn" style="margin-top: 80px !important;">今すぐ登録して、専門家に相談する</a>
            @else
                <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 80px !important;">今すぐ登録して、専門家に相談する</a>
            @endif
        </div>

    </div>
</div>

<div class="sectionbar4">
    <div class="container" id="row1">
        <div class="row justify-content-center">
            <img src="/images/svg/img-logo-210-56.svg">
            <p class="title1">が選ばれる</p>
            <p class="title2">理由</p>
        </div>
    </div>
    <div class="container" id="row2">
        <div class="row align-items-end">
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1" style="z-index:10"><span class="bdred">経験豊富</span>な専門家が回答</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-answer-1.svg" style="z-index:5;margin-top:-40px">
                    <p id="tagline2" style="margin-top:-30px">MoneQで回答してくれる専門家は、<br/>
                    資格を保有していて、実務経験の<br/>
                    豊富な方を厳選しています。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1">最短<span class="bdred">5分</span>で回答</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-answer-2.svg" style="margin-top:-14px">
                    <p id="tagline2">相談に対して、速ければ最短5分で<br/>
                    回答がきます。お金のお悩みを迅速に<br/>
                    解決することができます。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <p id="tagline1" style="z-index:10"><span class="bdred">月300円</span>の格安料金</p>
                        </div>
                    </div>
                    <img src="/images/svg/img-answer-3.svg" style="z-index:5;margin-top:-24px">
                    <p id="tagline2" style="margin-top:-18px" >費用は、月額300円（税別）です。<br/>
                    1日10円という低コストで<br/>
                    24時間365日利用できるサービスです。</p>
                </article>
            </div>
        </div>

        <div class="text-center">
            @if(Cookie::has('token'))
                <a href="{{route('post.create')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important;">今すぐ登録して、専門家に相談する</a>
            @else
                <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important;">今すぐ登録して、専門家に相談する</a>
            @endif
        </div>

    </div>
</div>

<div class="sectionbar5">
    <div class="container" id="row1">
        <div class="row justify-content-center">
            <p class="title1">プラン</p>
        </div>
    </div>
    <div class="container" id="row2" style="margin-top:60px">
        <div class="row no-gutters justify-content-center">
            <div class="tag">
                <ul>
                    <li class="tagheader"></li>
                    <li>料金</li>
                    <li>専門家相談</li>
                    <li>過去のQ&A閲覧</li>
                    <li>追加質問</li>
                    <li>個別相談※</li>
                    <li>登録</li>
                </ul>
            </div>
            <div class="columns" id="membership1">
                <ul class="price">
                    <li class="membership1"><span>お試し会員</span></li>
                    <li>月300円（税別)<br/>1日10円</li>
                    <li>月最大1回</li>
                    <li>無制限</li>
                    <li>1件の質問につき3回</li>
                    <li>可能</li>
                    <li><a href="{{ url('/login') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                </ul>
            </div>

            <div class="columns" id="membership2">
                <ul class="price">
                    <li class="membership2">スタンダード会員</li>
                    <li style="font-family:NotoSans-JP-Bold">
                        <div>
                        年<span style="font-size:24px">3,600</span>円（税別）<br/>
                        1日10円
                        </div>
                    </li>
                    <li>月最大3回</li>
                    <li>無制限</li>
                    <li>1件の質問につき3回</li>
                    <li>可能</li>
                    <li><a href="{{ url('/login') }}" class="btn yellow-roundbtn-150-30" >登録はこちら</a></li>
                </ul>
            </div>

            <div class="columns" id="membership3">
                <ul class="price">
                    <li class="membership3">無料会員</li>
                    <li style="font-family:NotoSans-JP-Bold"><span style="font-size:24px">0</span>円</li>
                    <li>-</li>
                    <li>月3件閲覧可能</li>
                    <li>-</li>
                    <li>可能</li>
                    <li><a href="{{ url('/login') }}" class="btn white-roundbtn-150-30" >登録はこちら</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="sectionbar6">
    <div class="container" id="row1">
        <div class="row justify-content-center">
            <p class="title1 mb-0" style="margin-top:80px">いつでも、気軽に、お金の相談ができる</p>
        </div>
        <div class="row justify-content-center">
            <p class="title1">あなたのマネーパートナーを手に入れましょう！</p>
        </div>
    </div>
    <div class="text-center">
        <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 42px !important;">会員登録</a>
    </div>
</div>

<div class="sectionbar7">
    <div class="container p-0" id="row1">
        <div class="row justify-content-center">
            <p class="title1" style="margin-top:80px">お金の相談</p>
        </div>
        <div class="container-fluid pl-0 pr-0">
            <ul class="nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="consult-money-1-tab" data-toggle="tab" href="#consult-money-1" role="tab" aria-controls="consult-money-1" aria-selected="false">注目</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="consult-money-2-tab" data-toggle="tab" href="#consult-money-2" role="tab" aria-controls="consult-money-2" aria-selected="false">新着質問</a>
                </li>
            </ul>

            <div class="tab-content" id="tab1">
                <div class="tab-pane fade active show" id="consult-money-1" role="tabpanel" aria-labelledby="consult-money-1-tab">
                    @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])
                    @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])
                </div>
                <div class="tab-pane fade" id="consult-money-2" role="tabpanel" aria-labelledby="consult-money-2-tab">
                    @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])
                    @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important; letter-spacing:3px">もっと見る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container p-0" id="row2">
        <div class="row justify-content-center">
            <p class="title1" style="margin-top:80px">お金の専門家</p>
        </div>
        <div class="container-fluid pl-0 pr-0">
            <ul class="nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="expert-money-1-tab" data-toggle="tab" href="#expert-money-1" role="tab" aria-controls="expert-money-1" aria-selected="false">月間回答数</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="expert-money-2-tab" data-toggle="tab" href="#expert-money-2" role="tab" aria-controls="expert-money-2" aria-selected="false">総合回答数</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="expert-money-3-tab" data-toggle="tab" href="#expert-money-3" role="tab" aria-controls="expert-money-3" aria-selected="false">月間役に立った数</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="expert-money-4-tab" data-toggle="tab" href="#expert-money-4" role="tab" aria-controls="expert-money-4" aria-selected="false">総合役に立った数</a>
                </li>
            </ul>
            <div class="tab-content" id="tab2">
                <div class="tab-pane fade active show" id="expert-money-1" role="tabpanel" aria-labelledby="expert-money-1-tab">
                    <div class="row">
                        <div class="col-6 userinfo">
                            @include('layouts.parts.custom.userinfo', ["type" => "userinfo", 'name' => 'userinfo', 'contents' => ''])
                        </div>
                        <div class="col-6 userinfo">
                            @include('layouts.parts.custom.userinfo', ["type" => "userinfo", 'name' => 'userinfo', 'contents' => ''])
                        </div>
                        <div class="col-6 userinfo">
                            @include('layouts.parts.custom.userinfo', ["type" => "userinfo", 'name' => 'userinfo', 'contents' => ''])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('entry')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important; letter-spacing:3px">もっと見る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color:#fff9f2">
        <div class="container p-0" id="row3">
            <div class="row justify-content-center">
                <p class="title1" style="margin-top:80px">相談テーマからQ&Aを調べる</p>
            </div>

            <div class="row" style="margin-top:50px">

                <div class="col-4" style="width:360px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【資産運用】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">お金の貯め方全般</a></span>
                            <span class="w-100"></span>
                            <span><a href="#" class="pr-3 text-dark">貯金</a></span>
                            <span><a href="#" class="pr-3 text-dark">預金</a></span>
                            <span><a href="#" class="pr-3 text-dark">定期預金</a></span>
                            <span><a href="#" class="pr-3 text-dark">外貨預金</a></span>
                            <span><a href="#" class="pr-3 text-dark">積立株式投資</a></span>
                            <span><a href="#" class="pr-3 text-dark">NISA</a></span>
                            <span><a href="#" class="pr-3 text-dark">投資信託</a></span>
                            <span><a href="#" class="pr-3 text-dark">ETF</a></span>
                            <span><a href="#" class="pr-3 text-dark">REITFX</a></span>
                            <span><a href="#" class="pr-3 text-dark">金投資</a></span>
                            <span><a href="#" class="pr-3 text-dark">CFD</a></span>
                            <span><a href="#" class="pr-3 text-dark">先物取引</a></span>
                            <span><a href="#" class="pr-3 text-dark">仮想通貨不動産投資</a></span>
                            <span><a href="#" class="pr-3 text-dark">賃貸経営</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【保険】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">保険全般</a></span>
                            <span><a href="#" class="pr-3 text-dark">生命保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">終身保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">医療保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">がん保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">自動車保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">火災保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">地震保険</a></span>
                            <span><a href="#" class="pr-3 text-dark">その他保険</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【税金】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">税金</a></span>
                            <span><a href="#" class="pr-3 text-dark">公的手当</a></span>
                            <span><a href="#" class="pr-3 text-dark">給付金</a></span>
                            <span><a href="#" class="pr-3 text-dark">補助金</a></span>
                            <span><a href="#" class="pr-3 text-dark">助成金</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px;margin-top:40px;margin-bottom:40px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【老後】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">老後のお金全般年金</a></span>
                            <span class="w-100"></span>
                            <span><a href="#" class="pr-3 text-dark">個人年金</a></span>
                            <span><a href="#" class="pr-3 text-dark">iDeco相続</a></span>
                            <span><a href="#" class="pr-3 text-dark">介護</a></span>
                            <span><a href="#" class="pr-3 text-dark">退職金</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px;margin-top:40px;margin-bottom:40px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【生活】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">家計全般</a></span>
                            <span><a href="#" class="pr-3 text-dark">ライフプラン</a></span>
                            <span><a href="#" class="pr-3 text-dark">家計簿</a></span>
                            <span><a href="#" class="pr-3 text-dark">節約住まい選び</a></span>
                            <span><a href="#" class="pr-3 text-dark">マイホーム</a></span>
                            <span><a href="#" class="pr-3 text-dark">住宅ローン車</a></span>
                            <span><a href="#" class="pr-3 text-dark">マイカーローン</a></span>
                            <span><a href="#" class="pr-3 text-dark">カーシェア結婚</a></span>
                            <span><a href="#" class="pr-3 text-dark">離婚</a></span>
                            <span><a href="#" class="pr-3 text-dark">出産</a></span>
                            <span><a href="#" class="pr-3 text-dark">教育</a></span>
                            <span><a href="#" class="pr-3 text-dark">子育てクレジットカード</a></span>
                            <span><a href="#" class="pr-3 text-dark">デビットカード</a></span>
                            <span><a href="#" class="pr-3 text-dark">電子マネー</a></span>
                            <span><a href="#" class="pr-3 text-dark">ポイント</a></span>
                            <span><a href="#" class="pr-3 text-dark">QR決済</a></span>
                            <span><a href="#" class="pr-3 text-dark">金銭トラブル</a></span>
                            <span><a href="#" class="pr-3 text-dark">カードローン</a></span>
                            <span><a href="#" class="pr-3 text-dark">キャッシング</a></span>
                            <span><a href="#" class="pr-3 text-dark">借金全般ペット</a></span>
                            <span><a href="#" class="pr-3 text-dark">ペット保険</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px;margin-top:40px;margin-bottom:40px">
                    <div class="container-fluid">
                        <p class="p-0 m-0" id="title1" >【仕事】</p>
                        <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                        <div class="row container">
                            <span><a href="#" class="pr-3 text-dark">仕事全般</a></span>
                            <span><a href="#" class="pr-3 text-dark">転職</a></span>
                            <span><a href="#" class="pr-3 text-dark">退職</a></span>
                            <span><a href="#" class="pr-3 text-dark">副業</a></span>
                            <span><a href="#" class="pr-3 text-dark">起業</a></span>
                            <span><a href="#" class="pr-3 text-dark">独立</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="width:360px">
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid" style="background-color:white">
        <div class="container p-0" id="row4">
            <div class="row justify-content-center">
                <p class="title1">お知らせ</p>
            </div>
        </div>
        <div>
        </div>
    </div>


</div>



<div class="lightgreypanel">
 

    <div class="container p-3">

        <section>
            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">お知らせ</h4>
                </div>
            </div>
            <div class="container pt-5">
                <div class="row">
                    <div class="meta col col-sm-4">
                        <h5 class="font-weight-bold float-sm-right">2020/10/4</h5>
                    </div>
                    <div class="col col-sm-8">
                        <p class="underlineFor">******************************</p>
                    </div>
                </div>
                <div class="row">
                    <div class="meta col col-sm-4">
                        <h5 class="font-weight-bold float-sm-right">2020/10/4</h5>
                    </div>
                    <div class="col col-sm-8">
                        <p class="underlineFor">******************************</p>
                    </div>
                </div>
            </div>

        </section>

    </div>
</div>

@endsection
