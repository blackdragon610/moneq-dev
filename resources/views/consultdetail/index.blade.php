@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <!-- <section> -->
                <div class="sticky-top bg-white m-2">
                    <div class="nav flex-column">
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                    </div>
                </div>
            <!-- </section> -->
        </div>
        
        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            <div class="container">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel">
                            @include('layouts.parts.custom.articledetail', ["type" => "articledetail", 'name' => 'article', 'contents' => ''])
                        </div>
                    </div>
                </section>
            </div>

            <div class="container">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel">
                            <h5 class="font-weight-bold p-2">2名の専門科が回答しています</h5>
                            <hr class="mt-2 mb-3"/>
                            @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer', 'contents' => ''])
                            @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer', 'contents' => ''])
                        </div>
                    </div>
                    <div class="row">
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
                                    <button class="btnSelected">専門家に相談をする（有料会員）</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="container">
                <section>
                    <div class="row">
                        <div class="container-fluid whitepanel pb-3">
                            <h5 class="font-weight-bold p-2">関連する質問</h5>
                            <hr class="mt-2 mb-3"/>
                            @include('layouts.parts.custom.question', ["type" => "question", 'name' => 'question', 'contents' => ''])
                            @include('layouts.parts.custom.question', ["type" => "question", 'name' => 'question', 'contents' => ''])
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>




@endsection
