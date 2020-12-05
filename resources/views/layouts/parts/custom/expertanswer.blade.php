<article class="col-12 p-1 bg-white">
    <div id="article">
        <div class="row pl-3">
            <div id="tag" class="text-center">{{$contents->post->sub_category->sub_name}}</div>
            <h5 class="font-weight-bold">{{$contents->post->post_name}}</h5>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg">
                <span id="date">{{$contents->created_at->format('Y/m/d')}}</span>
            </div>
        </div>

        <div id="userinfo" class="row p-0 m-0" style="border:0px">
            <img src="/images/img-avatar-sample.png" class="avatar m-0" id="avatar">
            <div id="content" style="margin-top:0px;margin-left:12px">
                <span id="name">{{$contents->expert_name_first.$contents->expert_name_second}}さん</span>
                <span id="name1">({{$contents->expert_name_kana_first.$contents->expert_name_kana_second}})</span>
                <br/>
                <span id="card" style="width:230px;display:inline-block"><img src="/images/svg/img-address-card-solid.svg">CFP®、住宅ローンアドバイザー</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-heart-solid.svg">解決済み：<span id="number">{{$contents->count_useful}}</span>件</span>
                <br/>
                <span id="sex" style="width:230px;display:inline-block">{{$contents->date_birth.'/'.$contents->gender}}</span>
                <span id="card" style="width:200px"><img src="/images/svg/img-yellow-messages-solid.svg">役に立った :
                @if(count($contents->postData()) > 0)
                    <span id="number">{{count($contents->postData())}}</span>
                @endif
                件</span>
            </div>
        </div>


        <div class="row pl-3">
            <p style="border:1px solid #ffd800; padding:5px;margin-top:10px">{{$contents->body}}</p>
        </div>
        <div class="row pl-3">
            @if(count($contents->postData()) > 0)
                <p class="ml-auto pr-3">役に立った : {{count($contents->postData())}}件</p>
            @endif
        </div>
        <div class="row pl-3">
                <span class="ml-auto pr-3">
                    {{$contents->created_at->format('Y/m/d')}}
                </span>
        </div>
    </div>
</article>
