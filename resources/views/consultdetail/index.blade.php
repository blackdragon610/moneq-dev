@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2" id="sticky" style="min-width:300px">
            <!-- <section> -->
            @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => ''])
            <!-- </section> -->
        </div>

        <div class="col-12 col-sm-9 order-sm-1" id="main" style="max-width:800px">
            <div style="margin-top:18px">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item">
                        <img src="/images/svg/image-fa-comments.svg" style="margin-right:4px">
                        <a href="{{url('/expert')}}" style="color:#9B9B9B">相談</a>
                    </li>
                    <li class="breadcrumb-item">
                        保険のことで質問です
                    </li>
                </ol>
            </div>

            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="pl-0 pr-0 mt-5">
                @include('layouts.parts.custom.articledetail', ["type" => "articledetail", 'name' => 'article',
                                                                'post'=>$post, 'postAdd'=>$postAdd, 'isUser'=>$isUser, 'hPost'=>$postHelpFlag, 'sPost' => $postStoreFlag])
            </div>
            <div class="col-12 p-0 mt-4" id="expertA">
                <p class="col-12 label-16px">
                    <span class="title-24px-red">{{count($postAnswer)}}</span>
                    名の専門家が回答しています
                    <span class="title-24px-red" style="margin-left:30px">{{number_format(1000)}}</span>件
                </p>

                @if(isLogin() == 1 && \Auth::user()->isAnswer())
                    @foreach ($postAnswer as $item)
                        @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer',
                                                                'contents' => $item, 'isUser'=>$isUser,
                                                                'post'=>$post, 'gender'=>$gender])
                        @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer',
                                                                'contents' => $item, 'isUser'=>$isUser,
                                                                'post'=>$post, 'gender'=>$gender])
                    @endforeach
                @endif

                @if( isLogin() != 1)
                    <div class="entryBaner pb-3">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-sm-8" style="margin-top: 30px">
                                <p class="detail_label text-center">専門家にお金の悩みを相談できます</p>
                                <div class="ml-5 pl-5 mt-4 detail_sub_label">
                                    <p>・ 月300円（税別）</p>
                                    <p>・ 毎月3回まで質問が可能</p>
                                    <p>・ 最短5分で回答可能</p>
                                    <p>・ 100名超の認定専門家が回答</p>
                                    <p>・ 回答率99％</p>
                                </div>
                                <div class="col text-center mt-5">
                                    <a href="{{route('entry')}}" class="btn yellow-roundbtn-440-50">今すぐ登録して、専門家に相談する</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(\Auth::user()->pay_status == 1)
                    <div class="entryBaner pb-3">
                        <div class="col-4"></div>
                        <div class="col-8">
                            <p class="title-24px-orange text-center">専門家にお金の悩みを相談できます</h5>
                            <ul style="padding-left:80px;list-style:none">
                                <li class="label-18px" style="margin-top:4px">・毎月3回まで質問が可能</li>
                                <li class="label-18px" style="margin-top:4px">・最短5分で回答可能</li>
                                <li class="label-18px" style="margin-top:4px">・100名超の認定専門家が回答</li>
                                <li class="label-18px" style="margin-top:4px">・月300円の格安料金</li>
                                <li class="label-18px" style="margin-top:4px">・スマホですぐに質問が可能</li>
                            </ul>
                            <div class="col text-center" style="margin-top:50px">
                                <a href="{{route('payment', ['sheetId'=>1, 'member'=>\Auth::user()->pay_status])}}" class="btn yellow-roundbtn-440-50">今すぐ登録して、専門家に相談する</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-12 p-0 mt-4" id="relationQ">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel ">
                            <p class="title-24px" style="margin-top:36px;margin-bottom:24px">関連する質問</p>
                            @foreach($relationPosts as $item)
                                @include('layouts.parts.custom.articleforconsult', ["type" => "question", 'name' => 'question', 'contents' => $item])
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
