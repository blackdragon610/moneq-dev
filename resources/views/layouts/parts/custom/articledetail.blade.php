<article class="col-12 p-0">
    <div id="article_detail">
        <div class="row m-0">
            <div id="tag" class="text-center">{{$post->sub_category->sub_name}}</div>
            <div class="ml-auto">
                <img src="/images/svg/img-clock-grey.svg"/>
                <span id="date">{{$post->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
        <h5 id="title">{{$post->post_name}}</h5>
        <img src="/images/svg/user.svg" class="avatar-lg m-0" id="avatar"/>
        <span id="name">{{$post->user->nickname.'さん'}}</span>
        <span id="age">{{getAge($post->user->date_birth)}}代{{'/'.$post->user->gender}}</span>

        @if($post->post_answer_id != 0)
            <span id="solved"><img src="/images/svg/img-checkbox-green-checked.svg"><span style="margin-left: 5px">解決済み</span></span>
        @else
            @if($post->count_answer != 0 || $post->deleted_at != null)
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">未解決</span></span>
            @else
                <span id="unsolved"><img src="/images/svg/img-checkbox-red-checked.svg"><span style="margin-left: 5px">回答なし</span></span>
            @endif
        @endif

        <img src="/images/svg/img-dashline.svg" style="height:1px;"/>

        <p class="label-16px" style="word-break: break-word;" >{{$post->body}}</p>

        @if($postAdd)
            @foreach ($postAdd as $item)
                <div class="mt-4 add-post">
                    <img src="/images/svg/img-grey-pencil.svg"/>
                    <span class="age label-14px" style="color:#707070">{{$item->created_at->format('Y/m/d')}}</span>
                    <span class="age label-14px" style="color:#707070">追記</span>
                    <div class="col pl-0 mt-2">
                        <p class="keepOneLine label-14px p-0 m-0">{{$item->body}}</p>
                    </div>
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

        <div class="row text-center pad0">
            <div class="col-12 col-sm-4 pad0">
                <a href="#expertA" class="btn white-btn-200-40 mt-2">専門家回答</a>
            </div>
            <div class="col-12 col-sm-4 pad0">
                <a href="#relationQ" class="btn white-btn-200-40 mt-2" >関連する質問</a>
            </div>
            @if($isUser == 1 && isLogin() == 1)
                <div class="col-12 col-sm-4 pad0">
                    <a href="{{route('post.report.add', ['pId'=>$post->id])}}" class="btn white-btn-200-40 mt-2" >相談に追記</a>
                </div>
            @endif
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

