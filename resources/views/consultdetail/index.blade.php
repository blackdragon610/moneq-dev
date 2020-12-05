@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2" id="sticky">
            <!-- <section> -->
            @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => ''])
            <!-- </section> -->
        </div>

        <div class="col-12 col-sm-9 order-sm-1 pl-0" id="main">
            <div class="container-fluid whitepanel pl-0">
                @include('layouts.parts.custom.articledetail', ["type" => "articledetail", 'name' => 'article',
                                                                'post'=>$post, 'postAdd'=>$postAdd, 'isUser'=>$isUser, 'hPost'=>$postHelpFlag, 'sPost' => $postStoreFlag])
            </div>
            <div class="row pt-5">
                <div class="container-fluid whitepanel" id="expertA">
                <p class="label-16px">
                    <span class="title-24px-red">{{count($postAnswer)}}</span>
                    名の専門科が回答しています. 
                    <span class="title-24px-red" style="margin-left:30px">1000</span>件
                </p>
                @if(isLogin() == 1 && \Auth::user()->isAnswer())
                    @foreach ($postAnswer as $item)
                        @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer',
                                                                'contents' => $item, 'isUser'=>$isUser,
                                                                'post'=>$post])
                    @endforeach
                @endif
                
                    @if( isLogin() != 1)
                        <div class="container-fluid whitepanel pb-3 pt-3">
                            <div class="container border border-dark pb-3">
                                <h5 class="font-weight-bold text-center p-2">有料会員になるとお金の専門家に相談できます</h5>
                                <hr class="mt-2 mb-3"/>
                                <ul>
                                    <li><i class="fa fa-check"></i>月300円（税別）</li>
                                    <li><i class="fa fa-check"></i>毎月3回まで質問が可能</li>
                                    <li><i class="fa fa-check"></i>最短5分で回答可能</li>
                                    <li><i class="fa fa-check"></i>100名超の認定専門家が回答</li>
                                    <li><i class="fa fa-check"></i>回答率99％</li>
                                </ul>
                                <div class="col text-center ">
                                    <a href="{{route('entry')}}" class="btnSelected btn">専門家に相談をする（有料会員）</a>
                                </div>
                            </div>
                        </div>
                    @elseif(\Auth::user()->pay_status == 1)
                        <div class="container-fluid whitepanel pb-3 pt-3">
                            <div class="container border border-dark pb-3">
                                <h5 class="font-weight-bold text-center p-2">有料会員になるとお金の専門家に相談できます</h5>
                                <hr class="mt-2 mb-3"/>
                                <ul>
                                    <li><i class="fa fa-check"></i>月300円（税別）</li>
                                    <li><i class="fa fa-check"></i>毎月3回まで質問が可能</li>
                                    <li><i class="fa fa-check"></i>最短5分で回答可能</li>
                                    <li><i class="fa fa-check"></i>100名超の認定専門家が回答</li>
                                    <li><i class="fa fa-check"></i>回答率99％</li>
                                </ul>
                                <div class="col text-center ">
                                    <a href="{{route('payment', ['sheetId'=>1, 'member'=>\Auth::user()->pay_status])}}" class="btnSelected btn">専門家に相談をする（有料会員）</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            <div class="container" id="relationQ">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel pb-3">
                            <h5 class="font-weight-bold p-2">関連する質問</h5>
                            <hr class="mt-2 mb-3"/>
                            @foreach($relationPosts as $item)
                                @include('layouts.parts.custom.relation', ["type" => "question", 'name' => 'question', 'post' => $item])
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

        </div>

        </div>
    </div>
</div>

@endsection
