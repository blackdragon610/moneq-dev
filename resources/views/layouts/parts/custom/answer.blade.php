<article class="col-12 p-1 bg-white">
    <div id="article">
        <div class="row">
            <div class="col-sm-1 pt-2">
                <a style="width:30px;height:30px;" href="{{route('expert.detail', $contents->expert_id)}}"><img src="http://placehold.it/50x50?text=P" alt=""></a>
            </div>
            <div class="col-sm-8 pt-2">
                <div class="container-fluid">
                    <div class="row">
                        <h5 class="font-weight-bold">{{$contents->expert->expert_name_second}}</h5>
                    </div>
                    <div class="row">
                        <div id="tag" class="text-center">{{$post->sub_category->sub_name}}</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 pt-2">
                <div class="container-fluid pl-0 pb-lg-1">
                    <span class="mright keepTwoLine">{{$contents->created_at->format('Y/m/d')}}</span>
                </div>
            </div>
        </div>
        @if(\Auth::user()->pay_status == 1)
            <div class="container" style="opacity:0.1">
        @else
            <div class="container">
        @endif
                <p>{{$item->body}}</p>
        </div>
        <button class="btn btn-default" type="button" id="dataHelp{{$contents->id}}">
            <i class="fa fa-heart-o <?php if(count($contents->postData()) > 0) echo 'fa_custom'?>" id="heart{{$contents->id}}"></i> 役に立った
        </button>
        @if($isUser == 1)
        <div class="col " name="answer" id="answer{{$contents->id}}">
            <div class="text-center">
                @if($post->post_answer_id && $post->post_answer_id != -1)
                    @if($contents->id == $post->post_answer_id)
                        <li><i class="fa fa-check justify-content-center"></i>この専門家の回答で解決</li>
                    @endif
                @else
                    <button class="btn btn-success justify-content-center" id="answered{{$contents->id}}">この専門家の回答で解決</button>
                @endif
            </div>
        </div>
        @endif
    </div>
</article>

<script>
    $('#answered' + {{$contents->id}}).on('click',function(){

        $.ajax({
            type: "GET",
            url: "{{url('/post/answer/')}}" + '/' + '{{$contents->post_id}}' + '/{{$contents->id}}',
            success: function (data) {
                console.log('Error:', data);
                if(data == 1){
                    $('[name="answer"]').empty().html();
                    $('#answer' + {{$contents->id}}).html('<li><i class="fa fa-check"></i>この専門家の回答で解決</li>');
                    $('#dataHelpAlert').empty().html('<img src="/images/solved-icon.png">');
                    $('.toast').toast('show');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('#dataHelp' + {{$contents->id}}).on('click',function(){

        $.ajax({
            type: "GET",
            url: "{{url('/post/answer/help')}}" + '/' + '{{$contents->id}}' + '/{{$contents->expert->id}}',
            success: function (data) {
                if(data == 1){
                    $('#heart' + {{$contents->id}}).addClass('fa_custom');
                }else{
                    $('#heart' + {{$contents->id}}).removeClass('fa_custom');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>
