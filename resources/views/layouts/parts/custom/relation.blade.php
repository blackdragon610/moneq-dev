<a href="{{url('post/detail').'/'.$post->id}}">
<article class="col-12 bg-white">
    <div id="article">
        <div class="row">
            <div id="tag" class="text-center">{{$post->sub_category->sub_name}}</div>
            <h5 class="font-weight-bold pl-2">{{$post->post_name}}</h5>
        </div>
        <div class="row">
            <span class="name">{{$post->user->nickname.'さん'}}</span>
        </div>
        <div class="row">
            <pre class="pt-2">{{$post->body}}</pre>
        </div>
        <div class="row">
            <span class="pr-1">{{$post->count_answer}}名が回答</span>
            <span class="ml-auto pr-1">{{$post->created_at->format('Y/m/d')}}</span>
        </div>
    </div>
</article>
</a>

