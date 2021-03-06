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
        <div id="static2" class="text-center">
        </div>
        <div class="input-group" id="searchbar">
            {{Form::open(['url'=> route('search.tema'),'method'=>'GET', 'files' => false, 'id' => 'form'])}}
                <div class='form-row'>
                    <input type="text" name="keyword" placeholder="お金の悩みを検索" id="searchTxt">
                    <button type="submit" class="btn btn-secondary form-control">
                        <i class="fa fa-search fa-1x"></i>
                    </button>
                </div>
            {{Form::close()}}
        </div>
        <div class="text-center mt-2">
            <p id="heading3" class="mt-0 mb-0">\ さっそく、お金の悩みを専門家に相談する /</p>
            @if(Cookie::has('custom_token'))
                <a href="{{route('post.create')}}" class="btn yellow-roundbtn mt-2" >今すぐ登録して、専門家に相談する</a>
            @else
                <a href="{{route('entry')}}" class="btn yellow-roundbtn mt-2">今すぐ登録して、専門家に相談する</a>
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
                        <h1 id="number">{{number_format($questions)}}</h1>
                        <span id="unit">件</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">役に立った回答</div>
                    <div class="inline-block">
                        <h1 id="number">{{number_format($helps)}}</h1>
                        <span id="unit">件</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">回答率</div>
                    <div class="inline-block">
                        <?php if($questions == 0) $questions = 1;?>
                        <h1 id="number">{{number_format(($answers/$questions)*100, 1)}}</h1>
                        <span id="unit">%</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">協力専門家</div>
                    <div class="inline-block">
                        <h1 id="number">{{$experts}}</h1>
                        <span id="unit">人</span>
                    </div>
                </div>
                <div class="overviewCard col-sm-2">
                    <div id="title">会員数</div>
                    <div class="inline-block">
                        <h1 id="number">{{$users}}</h1>
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
            @if(Cookie::has('custom_token'))
                <a href="{{route('post.create')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important;">今すぐ登録して、専門家に相談する</a>
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
                            <p id="tagline1" style="z-index:10">最短<span class="bdred">5分</span>で回答</p>
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
            @if(Cookie::has('custom_token'))
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
                    <li class="membership1" style="margin-top:20px;height:70px"><span>お試し会員</span></li>
                    <li>月300円（税別)<br/>1日10円</li>
                    <li>月最大1回</li>
                    <li>無制限</li>
                    <li>1件の質問につき3回</li>
                    <li>可能</li>
                    @if(isLogin() == -1)
                        <li><a href="{{ url('/entry') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @else
                        <li><a href="{{ url('profile/manage/membership') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @endif
                </ul>
            </div>

            <div class="columns" id="membership2">
                <ul class="price">
                    <li class="membership2" style="margin-top:0px;height:90px !important">
                        <div class="ribbon-wrapper-left">
                            <div class="ribbon ribbon-left">人気</div>
                        </div>
                        <div style="position:absolute">
                            スタンダード会員
                        </div>
                    </li>
                    <li style="font-family:NotoSans-JP-Bold;background-color:#fedc1a">
                        <div style="background-image:url('../images/svg/image-broken-5angles.svg');width:100%; height:100%">
                            <div style="margin-top:12px">
                            年<span style="font-size:24px">3,600</span>円（税別）<br/>
                            1日10円
                            </div>
                        </div>
                    </li>
                    <li>月最大3回</li>
                    <li>無制限</li>
                    <li>1件の質問につき3回</li>
                    <li>可能</li>
                    @if(isLogin() == -1)
                        <li><a href="{{ url('/entry') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @else
                        <li><a href="{{ url('profile/manage/membership') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @endif
                </ul>
            </div>

            <div class="columns" id="membership3" style="margin-top:20px;height:70px">
                <ul class="price">
                    <li class="membership3">無料会員</li>
                    <li style="font-family:NotoSans-JP-Bold"><span style="font-size:24px">0</span>円</li>
                    <li>-</li>
                    <li>月3件閲覧可能</li>
                    <li>-</li>
                    <li>可能</li>
                    @if(isLogin() == -1)
                        <li><a href="{{ url('/entry') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @else
                        <li><a href="{{ url('profile/manage/membership') }}" class="btn orange-roundbtn-150-30" >登録はこちら</a></li>
                    @endif
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
                        <a href="{{route('search.tema')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important; letter-spacing:3px">もっと見る</a>
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
                    <?php $i=0?>
                    <div class="row">
                        @foreach($monthAnswers as $expert)
                        <?php $i++?>
                        <div class="col-12 col-lg-6 userinfo">
                            @include('layouts.parts.custom.expertmonthinfo', [/*"ranking"=>"{{$i}}",*/ "type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                        'pre'=>$prefecture, 'spec' => $specialties])
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show" id="expert-money-2" role="tabpanel" aria-labelledby="expert-money-2-tab">
                    <?php $i=0?>
                    <div class="row">
                        @foreach($totalAnswers as $expert)
                        <?php $i++?>
                        <div class="col-12 col-lg-6 userinfo">
                            @include('layouts.parts.custom.expertinfo', [/*"ranking"=>"{{$i}}",*/ "type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                        'pre'=>$prefecture, 'spec' => $specialties])
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show" id="expert-money-3" role="tabpanel" aria-labelledby="expert-money-3-tab">
                    <?php $i=0?>
                    <div class="row">
                        @foreach($monthHelps as $expert)
                        <?php $i++?>
                            <div class="col-12 col-lg-6 userinfo">
                            @include('layouts.parts.custom.expertmonthinfo', [/*"ranking"=>"{{$i}}",*/ "type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                            'pre'=>$prefecture, 'spec' => $specialties])
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show" id="expert-money-4" role="tabpanel" aria-labelledby="expert-money-4-tab">
                    <?php $i=0?>
                    <div class="row">
                        @foreach($totalHelps as $expert)
                        <div class="col-12 col-lg-6 userinfo">
                            <?php $i++?>
                            @include('layouts.parts.custom.expertinfo', [/*"ranking"=>"{{$i}}",*/ "type" => "expertinfo", 'contents' => $expert, 'gender'=>$gender,
                                                                            'pre'=>$prefecture, 'spec' => $specialties])
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('search.expert')}}" class="btn yellow-roundbtn" style="margin-top: 50px !important; letter-spacing:3px">もっと見る</a>
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

                @foreach($categories as $item)
                    <div class="col-12 col-sm-6 col-md-4 p-2" style="width:360px">
                        <div class="container-fluid">
                            <p class="p-0 m-0" id="title1" >【{{$item['name']}}】</p>
                            <img src="/images/svg/img-dashline-small.svg" style="margin-top:12px;height:1px;margin-bottom:10px">
                            <div class="row container">
                                @foreach($item['groups'] as $key=>$sub)
                                    <span><a href="{{route('search.category', ['category'=>$key])}}" class="pr-3 text-dark">{{$sub}}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

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
            <div class="row" id="content">
                @foreach($notifications as $item)
                    @include('layouts.parts.custom.notice', ["type" => "notice", 'name' => 'notice',  'contents' => $item])
                @endforeach
                <div style="height:1px; width:100%"></div>
            </div>
            @if($notifications)
            <div class="row" style="padding-bottom:80px">
                <div class="col text-center">
                    <a href="#" class="btn yellow-roundbtn" style="margin-top: 50px !important; letter-spacing:3px">もっと見る</a>
                </div>
            </div>
            @endif
        </div>
    </div>


</div>
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
