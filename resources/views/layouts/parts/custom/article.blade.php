<article class="col-12 pl-0 pr-0">
    <div id="article">
        <div class="row m-0">

            {{-- <p>{{$contents->category->sub_name}}</p> --}}


            <div id="tag" class="text-center">保険</div>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg">
                <span id="date">{{$post->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
        <div id="title">{{$contents->post_name}}</div>
        <p id="description" class="keepTwoLine mb-0">{{$post->body}}</p>

        <img src="/images/img-avatar-sample.png" class="avatar" id="avatar">
        <span id="name">{{$contents->user->nickname}}さん</span>
        <span id="age">{{getEra($contents->user->date_birth).'/'.$gender[$post->user->gender]}}</span>
        
        @if($contents->isAnswerCheck() != 0)
            <span id="solved"><img src="/images/svg/img-checkbox-green-checked.svg">解決済み</span>
        @else
            <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg">未解決</span>
        @endif


        <img src="/images/svg/img-dashline.svg" style="margin-top:10px;height:1px">
        <div class="row m-0 align-items-center" style="padding-top:10px">
            <img src="/images/svg/img-avatar-grandfa.svg" class="avatar">
            <img src="/images/svg/img-avatar-young.svg" class="avatar" style="margin-left:10px">
            <span id="persons">{{$contents->answerCount()}}名</span><span id="answers">が回答</span>
            <!-- <span id="wait">専門家回答待ち</span> -->
        </div>
    </div>
</article>
