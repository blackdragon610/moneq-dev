<a href="{{url('post/detail').'/'.$contents->id}}">
<article class="col-12 p-0 mb-3" id="postId{{$contents->id}}">
    <div id="article">
        <div class="row m-0">
            <div id="tag" class="text-center">{{$contents->sub_category->sub_name}}</div>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg">
                <span id="date">{{$contents->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
        <div id="title">{{$contents->post_name}}</div>
        <p id="description" class="keepTwoLine mb-2">{{substr($contents->body, 0, 200)}}</p>

        <img src="/images/svg/user.svg" class="avatar-lg" id="avatar">
        <span id="name" class="mt-2">{{$contents->user->nickname}}さん</span>
        <span id="age" class="mt-2">{{getEra($contents->user->date_birth).'/'.$gender[$contents->user->gender]}}</span>

        @if($contents->post_answer_id != 0)
            <span id="solved"><img src="/images/svg/img-checkbox-green-checked.svg"><span style="margin-left: 5px">解決済み</span></span>
        @else
            @if($contents->count_answer != 0 || $contents->deleted_at != null)
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">未解決</span></span>
            @else
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">回答なし</span></span>
            @endif
        @endif

        <img src="/images/svg/img-dashline.svg" style="height:1px">
        @if($contents->answerCount() != 0)
            <div class="row m-0 align-items-center">
                <img src="/images/svg/img-avatar-grandfa.svg" class="avatar">
                <img src="/images/svg/img-avatar-young.svg" class="avatar">
                <span id="persons">{{$contents->answerCount()}}名</span><span id="answers">が回答</span>
            </div>
        @else
            <div class="row m-0 align-items-center" style="color:#FFD800"><span style="font-size: 14px">専門家回答待ち</span></div>
        @endif
    </div>
</article>
</a>

