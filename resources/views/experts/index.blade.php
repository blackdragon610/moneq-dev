@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <!-- <section> -->
                <div class="sticky-top m-2">
                    <div class="container-fluid pt-2 pb-2 bg-white">
                        <p>今すぐ、お金の専門家に相談</p>
                        <p><i class="fa fa-clock-o"></i> 最短5分で回答可能</p>
                        <p><i class="fa fa-clock-o"></i> 実務経験豊富な専門家が</p>
                        <p><i class="fa fa-clock-o"></i> 回答率99％</p>
                        <div class="col text-center ">
                            <a href="{{route('search.expert')}}" class="btn btnSelected mx-2">専門家に相談する</a>
                        </div>
                    </div>
                    <div class="container-fluid pt-2 pb-2">
                        <p>回答の多いお金の専門家</p>

                        <section class="pt-4">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" id="question-1-tab" data-toggle="tab" href="#question-1" role="tab" aria-controls="question-1" aria-selected="false">週間</a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" id="question-2-tab" data-toggle="tab" href="#question-2" role="tab" aria-controls="question-2" aria-selected="false">月間</a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" id="question-3-tab" data-toggle="tab" href="#question-3" role="tab" aria-controls="question-3" aria-selected="false">総合</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="question-1" role="tabpanel" aria-labelledby="question-1-tab">
                                    <div class="row">
                                        @foreach ($weekExperts as $item)
                                            @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="question-2" role="tabpanel" aria-labelledby="question-2-tab">
                                    <div class="row">
                                        @foreach ($monthExperts as $item)
                                            @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="question-3" role="tabpanel" aria-labelledby="question-3-tab">
                                    <div class="row">
                                        @foreach ($totalExperts as $item)
                                            @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="{{route('search.expert')}}" class="btn btnSelected mx-2">お金の専門家一覧</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            <!-- </section> -->
        </div>

        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            <div class="container">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel">
                            @include('layouts.parts.custom.userinfodetail', ["type" => "userinfodetail", 'name' => 'userinfo', 'contents' => $expert])
                        </div>
                    </div>
                </section>
            </div>

            <div class="container">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel">
                            <h5 class="font-weight-bold p-2">テスト太郎さんの回答一覧</h5>
                            <hr class="mt-2 mb-3"/>
                            @foreach ($answers as $item)
                                @include('layouts.parts.custom.answer1', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item])
                            @endforeach
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
</div>




@endsection
