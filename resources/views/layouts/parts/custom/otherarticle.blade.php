<a href="{{url('post/detail').'/'.$contents->id}}">
<article class="col-12 pl-0 pr-0">
    <div id="article">
        <div class="row m-0">
            <div id="tag" class="text-center">{{$contents->sub_name}}</div>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg">
                <span id="date">{{getDateFormat($contents->created_at)}}</span>
            </div>
        </div>
        <div id="title">{{$contents->post_name}}</div>
        <p id="description" class="keepTwoLine mb-2">{{substr($contents->body, 0, 200)}}</p>

        <img src="/images/svg/user.svg" class="avatar-lg" id="avatar">
        <span id="name" class="mt-2">{{$contents->nickname}}さん</span>
        @if($contents->gender == null)
            @dd($contents)
        @endif
        <span id="age" class="mt-2">{{getEra($contents->date_birth).'/'.$gender[$contents->gender]}}</span>

        @if($contents->post_answer_id != 0 || $contents->deleted_at != null)
            <span id="solved"><img src="/images/svg/img-checkbox-green-checked.svg"><span style="margin-left: 5px">解決済み</span></span>
        @else
            @if($contents->count_answer != 0)
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">未解決</span></span>
            @else
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">回答なし</span></span>
            @endif
        @endif

        <img src="/images/svg/img-dashline.svg" style="height:1px">
        @if($contents->count_answer != 0)
            <div class="row m-0 align-items-center">
                <img src="/images/svg/img-avatar-grandfa.svg" class="avatar">
                <img src="/images/svg/img-avatar-young.svg" class="avatar">
                <span id="persons">{{$contents->count_answer}}名</span><span id="answers">が回答</span>
            </div>
        @else
            <div class="row m-0 align-items-center" style="color:#FFD800"><span style="font-size: 14px">専門家回答待ち</span></div>
        @endif
    </div>
</article>
</a>
