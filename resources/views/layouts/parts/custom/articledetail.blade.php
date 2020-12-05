<article class="col-12 bg-white">
    <div id="article">
        <div class="row">
            <div id="tag" class="text-center">{{$post->sub_category->sub_name}}</div>
            <h5 class="font-weight-bold pl-2">{{$post->post_name}}</h5>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg">
                <span id="date">{{$post->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
        <div id="userinfo" class="row p-0 m-0" style="border:0px">
            <img src="/images/img-avatar-sample.png" class="avatar m-0" id="avatar">
            <div id="content" style="margin-top:0px;margin-left:12px;padding-top: 15px;">
                <span id="name">{{$post->user->nickname.'さん'}}</span>
                <span id="age">{{$post->user->date_birth}}</span>
                <span id="age">{{'/'.$post->user->gender}}</span>

                    @if($post->post_answer_id != 0)
                        <img src="/images/solved-icon.png">
                    @else
                        <span>回答待ち</span>
                    @endif
            </div>
        </div>

        <div class="row">
            <pre class="pt-2 label-16px" style="min-height:60px;margin-top:12px">{{$post->body}}</pre>
        </div>

        @if($postAdd)
            @foreach ($postAdd as $item)
                <div class="row">
                    <image src="/images/svg/img-grey-pencil.svg" style="padding-right:10px">
                    <span class="age label-14px" style="color:#707070">{{$item->created_at->format('Y/m/d')}}</span>
                    <span class="age label-14px" style="color:#707070">追記)</span>
                </div>
                <div class="row">
                    <p class="pt-2 keepOneLine label-14px">{{$item->body}}</p>
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
                    <a href="#expertA" class="white-btn-200-40 btn">専門家回答</a>
                </div>
                <div class="col-12 col-sm-4 pt-2">
                    <a href="#relationQ" class="white-btn-200-40 btn" >関連する質問</a>
                </div>
                @if($isUser == 1 && isLogin() == 1)
                    <div class="col-12 col-sm-4 pt-2">
                        <a href="{{route('post.report.add', ['pId'=>$post->id])}}" class="white-btn-200-40 btn" >相談に追記</a>
                    </div>
                @endif
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

