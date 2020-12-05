<div class="container-fluid bg-white" style="border:1px solid #dbdbdb; margin-top:48px">
    <p class="title-22px" style="margin-top:18px">今すぐ、お金の専門家に相談</p>
    <p class="label-14px" style="line-height:1.7">スマホですぐに質問が可能<br/>
    100名超の認定専門家が回答<br/>
    最短5分で回答可能</p>
    <img src="/images/svg/img-person-top31.svg" class="img-center">
    <div class="col text-center" style="margin-bottom:12px">
        <a href="{{route('search.expert')}}" class="btn yellow-roundbtn-200-30" 
            >専門家に相談する</a>
    </div>
</div>

<div class="container-fluid" style="margin-top:44px">
    <p class="title-16px">回答の多いお金の専門家</p>

    <section class="pt-4">
        <ul class="nav" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link active" id="question-1-tab" data-toggle="tab" href="#question-1" role="tab" aria-controls="question-1" aria-selected="false">週間</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="question-2-tab" data-toggle="tab" href="#question-2" role="tab" aria-controls="question-2" aria-selected="false">月間</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="question-3-tab" data-toggle="tab" href="#question-3" role="tab" aria-controls="question-3" aria-selected="false">総合</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="question-1" role="tabpanel" aria-labelledby="question-1-tab">
                <div class="row" style="margin-top:12px;min-height:80px">
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
                    <a href="{{route('search.expert')}}" class="btn yellow-btn-304-50 mx-2" style="width:100% !important">お金の専門家一覧</a>
                </div>
            </div>
        </div>
    </section>

</div>