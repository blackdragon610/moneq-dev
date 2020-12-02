<article class="col-12 bg-white">
    <div class="row">
        <img src="/images/insurance-icon.png" alt="">
        <h5 class="font-weight-bold pl-2">{{$post->post_name}}</h5>
        <div id="dataHelpAlert" class="ml-auto">
            @if($post->post_answer_id != 0)
                <img src="/images/solved-icon.png">
            @else
                <p>回答待ち</p>
            @endif
        </div>
    </div>
    <div class="row">
        <span class="name">{{$post->user->nickname.'さん'}}</span>
        <span class="age">{{$post->user->date_birth}}</span>
        <span class="gender">{{'/'.$post->user->gender}}</span>
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
    @if($isUser != 1 && isLogin() == 1)
        <div class="row">
            <button class="btn btn-default" type="button" id="dataSave">
                <i class="fa fa-bookmark-o <?php if($sPost !=0) echo 'fa_custom'?>" id="fa"></i> 保存する
            </button>
            <button class="btn btn-default" type="button" id="dataHelp">
                <i class="fa fa-heart-o <?php if($hPost !=0) echo 'fa_custom'?>" id="heart"></i> 参考になった
            </button>
        <a class="btn btn-default ml-auto" type="button" href="{{route('post.report', ['pId'=>$post->id])}}">
                <i class="fa fa-warning"></i> 通報する
            </a>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12 col-sm-4 pt-2">
                <a href="#expertA" class="btnSelected btn">専門家回答</a>
            </div>
            <div class="col-12 col-sm-4 pt-2">
                <a href="#relationQ" class="btnSelected btn" >関連する質問</a>
            </div>
            <div class="col-12 col-sm-4 pt-2">
                <a href="{{route('post.report.add', ['pId'=>$post->id])}}" class="btnSelected btn" >相談に追記</a>
            </div>
        </div>
    </div>
</article>
<script>
    $('#dataSave').on('click',function(){

        $.ajax({
            type: "GET",
            url: "{{url('/post/data/')}}" + '/' + '{{$post->id}}' + '/2',
            success: function (data) {
                console.log('Error:', data);
                if(data == 1){
                    $('#fa').addClass('fa_custom');
                }else{
                    $('#fa').removeClass('fa_custom');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('#dataHelp').on('click',function(){

        $.ajax({
            type: "GET",
            url: "{{url('/post/data/')}}" + '/' + '{{$post->id}}' + '/3',
            success: function (data) {
                if(data == 1){
                    $('#heart').addClass('fa_custom');
                }else{
                    $('#heart').removeClass('fa_custom');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>

