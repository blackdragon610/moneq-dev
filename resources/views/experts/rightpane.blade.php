<div class="container-fluid bg-white p-2 mt-5" style="border:1px solid #dbdbdb;min-width:300px">
    <p class="title-21px mt-3 text-center">今すぐ、お金の専門家に相談</p>
    <p class="label-14px" style="padding-left:50px">スマホですぐに質問が可能</p>
    <p class="label-14px" style="padding-left:50px">100名超の認定専門家が回答</p>
    <p class="label-14px" style="padding-left:50px">最短5分で回答可能</p>
    <img src="/images/svg/img-person-top31.svg" class="img-center">
    <div class="col text-center" style="margin-bottom:12px">
        <a href="{{route('search.expert')}}" class="btn yellow-roundbtn-200-30"
            >専門家に相談する</a>
    </div>
</div>

<div class="container-fluid mt-5">
    <p class="title-16px mb-1">回答の多いお金の専門家</p>

    <section class="mt-1 pt-0">
        <ul class="nav" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link active" id="question-1-tab" data-toggle="tab" href="#question-1" role="tab" aria-controls="question-1" aria-selected="false" style="font-size:16px !important">週間</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="question-2-tab" data-toggle="tab" href="#question-2" role="tab" aria-controls="question-2" aria-selected="false" style="font-size:16px !important">月間</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="question-3-tab" data-toggle="tab" href="#question-3" role="tab" aria-controls="question-3" aria-selected="false" style="font-size:16px !important">総合</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="question-1" role="tabpanel" aria-labelledby="question-1-tab">
                <div class="row expert-small">
                    @foreach ($weekExperts as $item)
                        @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade show" id="question-2" role="tabpanel" aria-labelledby="question-2-tab">
                <div class="row expert-small">
                    @foreach ($monthExperts as $item)
                        @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade show" id="question-3" role="tabpanel" aria-labelledby="question-3-tab">
                <div class="row expert-small">
                    @foreach ($totalExperts as $item)
                        @include('layouts.parts.custom.answerinfo', ["type" => "answerinfo", 'name' => 'answer', 'contents' => $item])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
<div class="mt-3">
    <a href="{{route('search.expert')}}" class="btn modal-btn-304-50 ml-0">お金の専門家一覧</a>
</div>
