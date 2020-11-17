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
        <div id="exTab1" class="container">	
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">buzz</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="profile">...</div>
                <div role="tabpanel" class="tab-pane fade" id="buzz">bbb</div>
                <div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
            </div>
        </div>

    </div>
</div>

@endsection
