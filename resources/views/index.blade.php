@extends('layouts/front', ["type" => 1])


@section('main')

<div class="">
    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">お金の悩みを「気軽に」専門家に質問できる</h4>
                <h4 class="font-weight-bold">日本最大級のお金相談サービス「MoneQ（マネク）」</h4>
                <h6>お金のQ&A数：○件　役に立った件数：○件　回答率：○％   協力専門家数：○人　会員数：(当初は非表示)</h6>
                <p class="text-secondary pt-4">お金の相談Q&Aを見る</p>                
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                            aria-hidden="true"></i></span>
                    </div>
                </div>
                <p class="text-secondary pt-4">さっそく、お金の悩みを専門家に相談する</p>  
                <a href="#" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
            </div>
        </div>
    </div>
</div>
<div class="lightgreypanel">
    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">こんなお悩みありませんか？</h4>
            </div>
        </div>
        <div class="row text-center">
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>お金のことを 信頼して相談できる人が 周りにいない</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>ちょっとした お金の疑問で 専門家に相談できない</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>FPに相談すると 保険を売られるのではないか 不安</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>

            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>ネットのお金の情報は 執筆者が見えないので 信用できない</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>自分の状況にあった お金に関する アドバイスが欲しい</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>ファイナンシャルコーチ などを頼みたいが 料金が高額</h5>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
        </div>
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">「MoneQ」がそのお悩みを解決します！</h4>
                <h4 class="font-weight-bold">「MoneQ」は、低価格で使えるお金の相談パートナーです。</h4>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">日本最大級のお金相談サービス「MoneQ」とは？</h4>
            </div>
        </div>
        <div class="row text-center">
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>1. お金の相談をする</h5>
                <p>家計・貯蓄・保険・投資・相続・住宅ローンなど、どんな相談でも構いません</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>2. 専門家が回答する</h5>
                <p>相談に対して、100名以上のお金の専門家（FP、税理士、会計士など）が回答します。</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>3. 悩みが解決する</h5>
                <p>複数の専門家からの回答により、悩みが解決します。追加で質問することも可能です。</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="#" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
            </div>
        </div>
    </div>
</div>
<div class="lightgreypanel">
    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">「MoneQ」が選ばれる理由</h4>
            </div>
        </div>
        <div class="row text-center">
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>実務経験豊富な専門家が回答</h5>
                <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>最短5分で回答</h5>
                <p>相談に対して、速ければ最短5分で回答がきます。お金のお悩みを迅速に解決することができます。</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 p-5">
                <h5>格安の料金体系</h5>
                <p>費用は、月額300円（税別）です。1日10円という低コストで24時間365日利用できるサービスです。</p>
                <i class="fa fa-6x fa-legal color-primary margin-b-20">イラスト・アイコン</i>
            </article>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="#" class="btn btn-outline-orange mx-2">今すぐ登録して、専門家に相談する</a>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container p-5">
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
    </div>
</div>
<div class="blackpanel">
    <div class="container p-2">
        <div class="row">
            <div class="col text-center">
                <h4 class="text-light">いつでも、気軽に、お金の相談ができる</h4>
                <h4 class="text-light">あなたのマネーパートナーを手に入れましょう！</h4>
            </div>
        </div>
        <div class="row">
            <div class="col text-center pt-4">
                <a href="#" class="btn btn-outline-orange mx-2">会員登録</a>
            </div>
        </div>
    </div>
</div>
<div class="lightgreypanel">
    <div class="container p-5">
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
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="meta">
                            <h5 class="font-weight-bold">保険のことで質問です</h5>
                        </div>
                        <div class="meta">
                            <span class="name">テスト太郎さん</span>
                            <span class="age">30代/男</span>
                            <span class="answers">2名が回答</span>
                            <span class="date">2020/09/16</span>
                        </div>
                        <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                    </article>
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="meta">
                            <h5 class="font-weight-bold">保険のことで質問です</h5>
                        </div>
                        <div class="meta">
                            <span class="name">テスト太郎さん</span>
                            <span class="age">30代/男</span>
                            <span class="answers">2名が回答</span>
                            <span class="date">2020/09/16</span>
                        </div>
                        <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                    </article>
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="meta">
                            <h5 class="font-weight-bold">保険のことで質問です</h5>
                        </div>
                        <div class="meta">
                            <span class="name">テスト太郎さん</span>
                            <span class="age">30代/男</span>
                            <span class="answers">2名が回答</span>
                            <span class="date">2020/09/16</span>
                        </div>
                        <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                    </article>
                </div>
                <div class="tab-pane fade" id="consult-money-2" role="tabpanel" aria-labelledby="consult-money-2-tab">
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="meta">
                            <h5 class="font-weight-bold">保険のことで質問です</h5>
                        </div>
                        <div class="meta">
                            <span class="name">テスト太郎さん</span>
                            <span class="age">30代/男</span>
                            <span class="answers">2名が回答</span>
                            <span class="date">2020/09/16</span>
                        </div>
                        <p>MoneQで回答してくれる専門家は、資格を保有していて、実務経験の豊富な方を厳選しています。</p>
                    </article>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-outline-orange mx-2">もっと見る</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="container p-5">
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
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="row">
                            <div class="meta col-md-4 col-lg-2">
                                <img src="http://placehold.it/150x50?text=Logo" alt="">
                            </div>
                            <div class="col-md-8 col-lg-4">
                                <div class="meta">
                                    <h5 class="font-weight-bold">テスト花子さん</h5>
                                    <p>（テストハナコ）</p>
                                </div>
                                <div class="meta">
                                    <span class="age">30代前半／女性</span>
                                    <span class="address">東京都</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="meta">
                                    <span class="font-weight-bold">回答数</span>
                                    <span>125件</span>
                                </div>
                                <div class="meta">
                                    <span class="font-weight-bold">3役に立った</span>
                                    <span >50件</span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-3">
                                <div class="meta">
                                    <h5 class="font-weight-bold">保有資格</h5>
                                </div>
                                <div class="meta">
                                    <span class="age">1級ファイナンシャル・プランニング技能士</span>
                                </div>
                            </div>
                    </article>
                    <article class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3">
                        <div class="row">
                            <div class="meta col-md-4 col-lg-2">
                                <img src="http://placehold.it/150x50?text=Logo" alt="">
                            </div>
                            <div class="col-md-8 col-lg-4">
                                <div class="meta">
                                    <h5 class="font-weight-bold">テスト花子さん</h5>
                                    <p>（テストハナコ）</p>
                                </div>
                                <div class="meta">
                                    <span class="age">30代前半／女性</span>
                                    <span class="address">東京都</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="meta">
                                    <span class="font-weight-bold">回答数</span>
                                    <span>125件</span>
                                </div>
                                <div class="meta">
                                    <span class="font-weight-bold">3役に立った</span>
                                    <span >50件</span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-3">
                                <div class="meta">
                                    <h5 class="font-weight-bold">保有資格</h5>
                                </div>
                                <div class="meta">
                                    <span class="age">1級ファイナンシャル・プランニング技能士</span>
                                </div>
                            </div>
                    </article>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-outline-orange mx-2">もっと見る</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">相談テーマからQ&Aを調べる</h4>
            </div>
        </div>
        <section class="pt-4 bg-white">
            <div class="row">
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【資産運用】</p>
                    <div class="meta">
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
                </article>    
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【保険】</p>
                    <div class="meta">
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
                </article>    
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【税金】</p>
                    <div class="meta">
                        <span><a href="#" class="pr-3 text-dark">税金</a></span>
                        <span><a href="#" class="pr-3 text-dark">公的手当</a></span>
                        <span><a href="#" class="pr-3 text-dark">給付金</a></span>
                        <span><a href="#" class="pr-3 text-dark">補助金</a></span>
                        <span><a href="#" class="pr-3 text-dark">助成金</a></span>
                    </div>
                </article>
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【老後】</p>
                    <div class="meta">
                        <span><a href="#" class="pr-3 text-dark">老後のお金全般年金</a></span>
                        <span><a href="#" class="pr-3 text-dark">個人年金</a></span>
                        <span><a href="#" class="pr-3 text-dark">iDeco相続</a></span>
                        <span><a href="#" class="pr-3 text-dark">介護</a></span>
                        <span><a href="#" class="pr-3 text-dark">退職金</a></span>
                    </div>
                </article>    
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【生活】</p>
                    <div class="meta">
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
                </article>   
                <article class="col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                    <p>【仕事】</p>
                    <div class="meta">
                        <span><a href="#" class="pr-3 text-dark">仕事全般</a></span>
                        <span><a href="#" class="pr-3 text-dark">転職</a></span>
                        <span><a href="#" class="pr-3 text-dark">退職</a></span>
                        <span><a href="#" class="pr-3 text-dark">副業</a></span>
                        <span><a href="#" class="pr-3 text-dark">起業</a></span>
                        <span><a href="#" class="pr-3 text-dark">独立</a></span>
                    </div>
                </article>    
            </div>
        </section>
    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col text-center">
                <h4 class="font-weight-bold">お知らせ</h4>
            </div>
        </div>
        <div class="row">
            <div class="meta col-md-4 col-lg-4">
                <h5 class="font-weight-bold">2020/10/4</h5>
            </div>
            <div class="col-md-8 col-lg-8">
                <p>***************</p>
            </div>
        </div>
    </div>
</div>

@endsection
