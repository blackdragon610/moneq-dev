@if($contents->post)
<article class="col-12 p-0 mb-3 bg-white">
    <div id="article_expert">
        <div class="container">
            <div class="row m-0">
                <div id="tag" class="text-center" style="margin-top:5px">{{$contents->post->sub_category->sub_name}}</div>
                <div id="title" style="margin-top:0px !important;margin-left:12px">{{$contents->post->post_name}}</div>
                <div class="ml-auto">
                    <img src="/images/svg/img-clock-grey.svg">
                    <span id="date">{{$contents->created_at->format('Y/m/d')}}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2 p-0" style="margin:auto">
                    <img src="/images/img-avatar-sample.png" class="avatar-lg m-0" id="avatar" style="margin-left:35px !important">
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-5">
                            <span id="name" class="m-0">{{$contents->expert->expert_name_first.$contents->expert_name_second}}さん</span>
                            <span id="name1">{{$contents->expert->expert_name_kana_first.$contents->expert_name_kana_second}}</span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-8">
                            <span id="card"><img src="/images/svg/img-address-card-solid.svg">
                                @foreach($license as $item)
                                    {{$item->body.' '}}
                                @endforeach
                        </span>
                        </div>
                        <div class="col-4">
                            @if($contents->post->post_answer_id != 0)
                                <span id="expert_solved"><img src="/images/svg/img-checkbox-green-checked.svg"><span style="margin-left: 5px">解決済み</span></span>
                            @else
                                <span id="expert_unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">未解決</span></span>
                            @endif
                        </div>
                        <div class="w-100"></div>
                        <div class="col-8">
                            <span id="card">{{getEra($contents->expert->date_birth).'/'.configJson('custom/gender')[$contents->expert->gender]}}</span>
                        </div>
                        <div class="col-4">
                            <span class="label-16px"><img class="heart-icon" src="/images/svg/yellow-heart-solid.svg">役に立った
                                @if(count($contents->postData()) > 0)
                                    <span id="number">{{count($contents->postData())}}</span>
                                @endif
                            件</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <p class="speech" style="border:1px solid #ffd800; padding:5px;margin-top:10px;width:100%">{{$contents->body}}</p>
        </div>
    </div>
</article>
@endif
