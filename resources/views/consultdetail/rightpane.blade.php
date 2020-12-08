<div class="container pt-2 pb-2 bg-white">
    <p>今すぐ、お金の専門家に相談</p>
    <p><i class="fa fa-clock-o"></i> 最短5分で回答可能</p>
    <p><i class="fa fa-clock-o"></i> 実務経験豊富な専門家が</p>
    <p><i class="fa fa-clock-o"></i> 回答率99％</p>
    <div class="col text-center ">
        <a href="{{route('search.expert')}}" class="btn btnSelected mx-2">専門家に相談する</a>
    </div>
</div>
    <h5 class="pt-5">回答の多いお金の専門家</h5>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" id="question-1-tab" data-toggle="tab" href="#question-1" role="tab" aria-controls="question-1" aria-selected="false" style="font-size:16px !important">週間</a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" id="question-2-tab" data-toggle="tab" href="#question-2" role="tab" aria-controls="question-2" aria-selected="false" style="font-size:16px !important">月間</a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" id="question-3-tab" data-toggle="tab" href="#question-3" role="tab" aria-controls="question-3" aria-selected="false" style="font-size:16px !important">総合</a>
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