<article class="col-12 bg-white">
    <div class="row">
        <img src="/images/insurance-icon.png" alt="">
        <h5 class="font-weight-bold pl-2">{{$post->post_name}}</h5>
        @if($post->post_answer_id != 0)
            <img src="/images/solved-icon.png" class="ml-auto">
        @endif
    </div>
    <div class="row">
        <span class="name">{{$post->user->nickname.'さん'}}</span>
        <span class="age">{{$post->user->date_birth}}</span>
        <span class="ml-auto pr-1">{{$post->created_at->format('Y/m/d')}}</span>
    </div>
    <div class="row">
        <p class="pt-2">{{$post->body}}</p>
    </div>
    @if($postAdd)
        @foreach ($postAdd as $item)
            <div class="row">
                <span class="age text-danger">{{'('.$item->created_at->format('Y/m/d')}}</span>
                <span class="age text-danger">追記)</span>
            </div>
            <div class="row">
                <p class="pt-2 keepOneLine text-danger">{{$item->body}}</p>
            </div>
        @endforeach
    @endif
    <div class="row">
        <button class="btn btn-default" type="button">
            <i class="fa fa-bookmark-o"></i> 保存する
        </button>
        <button class="btn btn-default" type="button">
            <i class="fa fa-heart-o"></i> 参考になった
        </button>
        <button class="btn btn-default ml-auto" type="button">
            <i class="fa fa-warning"></i> 通報する
        </button>
    </div>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12 col-sm-4 pt-2">
                <a href="#" class="btnSelected btn">専門家回答</a>
            </div>
            <div class="col-12 col-sm-4 pt-2">
                <a href="#" class="btnSelected btn" >関連する質問</a>
            </div>
            <div class="col-12 col-sm-4 pt-2">
                <a href="#" class="btnSelected btn" >相談に追記</a>
            </div>
        </div>
    </div>
</article>
