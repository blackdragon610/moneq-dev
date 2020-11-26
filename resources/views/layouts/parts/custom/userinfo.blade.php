<article class="col-12 p-1">
    <div class="row">
        @if (isset($ranking))
        <img src="/images/svg/img-ranking-{{ $ranking }}.svg" class="ranking">
        @endif
        <div id="userinfo" class="row container-fluid">
            <img src="/images/img-avatar-sample.png" id="avatar" class="avatar">
            <div id="content">
                <span id="name">テスト太郎さん</span>
                <span id="name1">シシド ミカ</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">CFP®、住宅ローンアドバイザー</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">回答数：<span id="number">125</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">30代前半 女性</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">125</span>件</span>
                <br/>
                <span>東京都</span>
            </div>
        </div>
    </div>
</article>
