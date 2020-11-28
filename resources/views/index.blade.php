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
            {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                <div class='form-row'>
                    <input type="text" class="form-control" placeholder="お金の悩みを検索" id="searchTxt">
                    <button type="button" class="btn btn-secondary form-control">
                        <i class="fa fa-search fa-1x"></i>
                    </button>
                </div>
            {{Form::close()}}
        </div>
        <p id="heading3" class="mt-0 mb-0">\ さっそく、お金の悩みを専門家に相談する /</p>
        <div class="col text-center">
            @if(Cookie::has('custom_token'))
                <a href="{{route('post.create')}}" class="btn">今すぐ登録して、専門家に相談する</a>
            @else
                <a href="{{route('entry')}}" class="btn">今すぐ登録して、専門家に相談する</a>
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
                    <p id="tagline1">お金の相談をする</p>
                    <img src="/images/svg/img-consult-1.svg">
                    <p id="tagline2">家計・貯蓄・保険・投資・相談・住宅ローン<br/>
                        などの「お金の相談」を<br/>
                        スマホ・パソコンから送信します。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <button class="roundbtn">STEP 2</button>
                    <p id="tagline1">専門家が回答する</p>
                    <img src="/images/svg/img-consult-2.svg">
                    <p id="tagline2">「お金の相談」に対して<br/>
                    100名以上の複数の専門家（FP、税理士、<br/>
                    会計士…）が回答します。</p>
                </article>
            </div>
            <div class="col">
                <article class="col-12 p-0 text-center">
                    <button class="roundbtn">STEP 3</button>
                    <p id="tagline1">悩みが解決する</p>
                    <img src="/images/svg/img-consult-3.svg">
                    <p id="tagline2">専門家からの回答で<br/>
                        お悩みが解決します。<br/>
                        追加質問や個別相談も可能です。</p>
                </article>
            </div>
        </div>
    </div>
</div>


<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">こんなお悩みありませんか？</h4>
                </div>
            </div>
            <div class="row d-flex justify-content-center text-center">
                <article >
                    <h5>お金のことを 信頼して相談できる人が 周りにいない</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article >
                    <h5>ちょっとした お金の疑問で 専門家に相談できない</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article >
                    <h5>FPに相談すると 保険を売られるのではないか 不安</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article >
                    <h5>ネットのお金の情報は 執筆者が見えないので 信用できない</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article >
                    <h5>自分の状況にあった お金に関する アドバイスが欲しい</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article >
                    <h5>ファイナンシャルコーチ などを頼みたいが 料金が高額</h5>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">「MoneQ」がそのお悩みを解決します！</h4>
                    <h4 class="font-weight-bold">「MoneQ」は、低価格で使えるお金の相談パートナーです。</h4>
                </div>
            </div>

        </section>

    </div>
</div>
<div class="bg-white">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <h4 class="font-weight-bold">日本最大級のお金相談サービス「MoneQ」とは？</h4>
                </div>
            </div>
            <div class="row d-flex justify-content-center text-center">
                <article>
                    <h5>1. お金の相談をする</h5>
                    <p>家計・貯蓄・保険・投資・相続・住宅ローンなど、どんな相談でも構いません</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article>
                    <h5>2. 専門家が回答する</h5>
                    <p>相談に対して、100名以上のお金の専門家（FP、税理士、会計士など）が回答します。</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article>
                    <h5>3. 悩みが解決する</h5>
                    <p>複数の専門家からの回答により、悩みが解決します。追加で質問することも可能です。</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
            </div>
            <div class="row">
                <div class="col text-center">
                    @if(Cookie::has('custom_token'))
                        <a href="{{route('post.create')}}" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
                    @else
                        <a href="{{route('entry')}}" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
                    @endif
                </div>
            </div>

        </section>
    </div>
</div>
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">「MoneQ」が選ばれる理由</h4>
                </div>
            </div>
            <div class="row d-flex justify-content-center text-center">
                <article>
                    <h5>実務経験豊富な専門家が回答</h5>
                    <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article>
                    <h5>最短5分で回答</h5>
                    <p>相談に対して、速ければ最短5分で回答がきます。お金のお悩みを迅速に解決することができます。</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
                <article>
                    <h5>格安の料金体系</h5>
                    <p>費用は、月額300円（税別）です。1日10円という低コストで24時間365日利用できるサービスです。</p>
                    <img src="http://placehold.it/200x50?text=Image" alt="">
                </article>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="#" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
                </div>
            </div>

        </section>
    </div>
</div>
<div class="bg-white">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4>プラン</h4>
                </div>
            </div>
            <div class="container-fluid">
                <table id="plantable" class="table table-bordered">
                    <colgroup>
                        <col class="first">
                        <col class="second">
                        <col class="third">
                        <col class="fourth">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>-</td>
                            <td style="background-color:#ffe699">資格を保有</td>
                            <td style="background-color:#f8cbad">迅速に解決することができます</td>
                            <td>専門家に</td>
                        </tr>
                        <tr>
                            <td>専門</td>
                            <td>迅速に解決することができます</td>
                            <td>迅速に解決することができます</td>
                            <td>専門</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
    </div>
</div>
<div class="blackpanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="text-light">いつでも、気軽に、お金の相談ができる</h4>
                    <h4 class="text-light">あなたのマネーパートナーを手に入れましょう！</h4>
                </div>
            </div>
            <div class="row">
                <div class="col text-center pt-4">
                    <a href="{{route('entry')}}" class="btn btn-outline-orange mx-2">会員登録</a>
                </div>
            </div>

        </section>

    </div>
</div>
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">お金の相談</h4>
                </div>
            </div>
            <section class="pt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" id="consult-money-1-tab" data-toggle="tab" href="#consult-money-1" role="tab" aria-controls="consult-money-1" aria-selected="false">新着</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" id="consult-money-2-tab" data-toggle="tab" href="#consult-money-2" role="tab" aria-controls="consult-money-2" aria-selected="false">新着質問</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="consult-money-1" role="tabpanel" aria-labelledby="consult-money-1-tab">
                        @foreach($accessTopPost as $post)
                            @include('layouts.parts.custom.article', ["type" => "article", 'contents' => $post, 'gender'=>$gender])
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="consult-money-2" role="tabpanel" aria-labelledby="consult-money-2-tab">
                        @foreach($newTopPost as $post)
                            @include('layouts.parts.custom.article', ["type" => "article", 'contents' => $post, 'gender'=>$gender])
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="#" class="btn btn-outline-orange mx-2">もっと見る</a>
                        </div>
                    </div>
                </div>
            </section>

        </section>

    </div>

    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">お金の専門家</h4>
                </div>
            </div>
            <section class="pt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" id="expert-money-1-tab" data-toggle="tab" href="#expert-money-1" role="tab" aria-controls="expert-money-1" aria-selected="false">月間回答数</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" id="expert-money-2-tab" data-toggle="tab" href="#expert-money-2" role="tab" aria-controls="expert-money-2" aria-selected="false">総合回答数</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" id="expert-money-3-tab" data-toggle="tab" href="#expert-money-3" role="tab" aria-controls="expert-money-3" aria-selected="false">月間役に立った数</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" id="expert-money-4-tab" data-toggle="tab" href="#expert-money-4" role="tab" aria-controls="expert-money-4" aria-selected="false">総合役に立った数</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="expert-money-1" role="tabpanel" aria-labelledby="expert-money-1-tab">
                        @foreach($monthAnswers as $expert)
                            @include('layouts.parts.custom.expertmonthinfo', ["type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                         'pre'=>$prefecture, 'spec' => $specialties])
                        @endforeach
                    </div>
                    <div class="tab-pane fade show" id="expert-money-2" role="tabpanel" aria-labelledby="expert-money-2-tab">
                        @foreach($totalAnswers as $expert)
                            @include('layouts.parts.custom.expertinfo', ["type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                         'pre'=>$prefecture, 'spec' => $specialties])
                        @endforeach
                    </div>
                    <div class="tab-pane fade show" id="expert-money-3" role="tabpanel" aria-labelledby="expert-money-3-tab">
                        @foreach($monthHelps as $expert)
                            @include('layouts.parts.custom.expertmonthinfo', ["type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                          'pre'=>$prefecture, 'spec' => $specialties])
                        @endforeach
                    </div>
                    <div class="tab-pane fade show" id="expert-money-4" role="tabpanel" aria-labelledby="expert-money-4-tab">
                        @foreach($totalHelps as $expert)
                            @include('layouts.parts.custom.expertinfo', ["type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                         'pre'=>$prefecture, 'spec' => $specialties])
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="#" class="btn btn-outline-orange mx-2">もっと見る</a>
                        </div>
                    </div>
                </div>
            </section>

        </section>

    </div>

    <div class="container p-3">
        <section>

            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">相談テーマからQ&Aを調べる</h4>
                </div>
            </div>
            <section class="pt-4 bg-white">
                <div class="row pl-4">
                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【資産運用】</p>
                            <div class="row">
                                <span><a href="#" class="pr-3 text-dark">お金の貯め方全般</a></span>
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
                    </article>

                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【保険】</p>
                            <div class="row">
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
                    </article>

                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【税金】</p>
                            <div class="row">
                                <span><a href="#" class="pr-3 text-dark">税金</a></span>
                                <span><a href="#" class="pr-3 text-dark">公的手当</a></span>
                                <span><a href="#" class="pr-3 text-dark">給付金</a></span>
                                <span><a href="#" class="pr-3 text-dark">補助金</a></span>
                                <span><a href="#" class="pr-3 text-dark">助成金</a></span>
                            </div>
                        </div>
                    </article>

                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【老後】</p>
                            <div class="row">
                                <span><a href="#" class="pr-3 text-dark">老後のお金全般年金</a></span>
                                <span><a href="#" class="pr-3 text-dark">個人年金</a></span>
                                <span><a href="#" class="pr-3 text-dark">iDeco相続</a></span>
                                <span><a href="#" class="pr-3 text-dark">介護</a></span>
                                <span><a href="#" class="pr-3 text-dark">退職金</a></span>
                            </div>
                        </div>
                    </article>

                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【生活】</p>
                            <div class="row">
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
                    </article>

                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                            <p>【仕事】</p>
                            <div class="row">
                                <span><a href="#" class="pr-3 text-dark">仕事全般</a></span>
                                <span><a href="#" class="pr-3 text-dark">転職</a></span>
                                <span><a href="#" class="pr-3 text-dark">退職</a></span>
                                <span><a href="#" class="pr-3 text-dark">副業</a></span>
                                <span><a href="#" class="pr-3 text-dark">起業</a></span>
                                <span><a href="#" class="pr-3 text-dark">独立</a></span>
                            </div>
                        </div>
                    </article>

                </div>
            </section>

        </section>
    </div>

    <div class="container p-3">

        <section>
            <div class="row">
                <div class="col text-center">
                    <h4 class="font-weight-bold">お知らせ</h4>
                </div>
            </div>
            <div class="container pt-5">
                @foreach($notifications as $item)
                <div class="row">
                    <div class="meta col col-sm-4">
                        <h5 class="font-weight-bold float-sm-right">{{$item->created_at}}</h5>
                    </div>
                    <div class="col col-sm-8">
                        <a class="underlineFor" href="{{route('notification.route', [$item->type, $item->id])}}">
                            {{$item->post_name}}に関して、{{$item->ext_name}}さんから回答がありました。</a>
                    </div>
                </div>
                @endforeach
            </div>

        </section>

    </div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){

        $('#searchTxt').on('keyup', function(){

            var text = $('#searchTxt').val();

            $.ajax({

                type:"GET",
                url: "{{url('search')}}" + '/' + text,
                success: function(response) {
                    var keyArray= [];
                    response = JSON.parse(response);
                    for (var patient of response) {
                        keyArray.push(patient['keyword']);
                    }
                    $( "#searchTxt" ).autocomplete({
                        source: keyArray
                    });
                }
            });
        });

    });
</script>
@endsection
