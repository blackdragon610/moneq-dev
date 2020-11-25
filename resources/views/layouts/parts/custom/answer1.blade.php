<article class="col-12 p-1 bg-white">
    <div class="row pl-3">
        <img src="/images/insurance-icon.png" class="mright">
        <h5 class="font-weight-bold">{{$contents->post->post_name}}</h5>
    </div>
    <div class="row pl-3">
        <p class="keepTwoLine">{{$contents->body}}</p>
    </div>
    <div class="row pl-3">
        <span class="ml-auto pr-3">{{$contents->created_at}}</span>
    </div>
</article>
