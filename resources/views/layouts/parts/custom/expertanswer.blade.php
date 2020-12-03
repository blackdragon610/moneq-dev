
<article class="col-12 p-1 bg-white">
    <div id="article">
        <div class="row pl-3">
            <div id="tag" class="text-center">{{$contents->post->sub_category->sub_name}}</div>
            <h5 class="font-weight-bold">{{$contents->post->post_name}}</h5>
        </div>
        <div class="row pl-3">
            <p class="keepTwoLine">{{$contents->body}}</p>
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
