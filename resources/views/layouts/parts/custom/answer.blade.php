<article class="col-12 p-0 bg-white" style="margin-bottom:24px">

    <div id="article" style="max-height:100%">
        <div class="row">
            <div style="max-width:80px;margin-left:15px;margin-top:15px">
                <a href="{{route('expert.detail', $contents->expert_id)}}">
                    <img src="/images/img-avatar-sample.png" style="width:80px;height:80px;">
                </a>
            </div>
            <div class="col-sm-6">
                <div id="expert-name" style="margin-top:6px">{{$contents->expert->expert_name_second}}</div>
                <div class="col p-0" style="margin-top:5px">
                    <img src="/images/svg/relation_card.svg">
                    <span>{{$post->sub_category->sub_name}}</span>
                </div>
                <span id="category">{{getEra($contents->date_birth)}}&nbsp;&nbsp;&nbsp;&nbsp;{{$gender[$contents->expert->gender]}}</span>
                <p id="category">{{configJson('custom/prefecture')[$contents->expert->prefecture_area]}}</p>
            </div>
                <div class="ml-auto">
                    <img src="/images/svg/img-clock-grey.svg">
                    <span id="date">{{$contents->created_at->format('Y/m/d')}}</span>
                </div>
        </div>
        @if(\Auth::user()->pay_status == 1)
            <div class="container-fluid" style="opacity:0.1;padding:0px">
        @else
            <div class="container-fluid" style="padding:0px">
        @endif
            <div class="speech-bubble">
                <p id="description">{{$item->body}}</p>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-default" type="button" id="dataHelp{{$contents->id}}">
                <i class="fa fa-heart-o <?php if(count($contents->postData()) > 0) echo 'fa_custom'?>" id="heart{{$contents->id}}"></i> 役に立った
            </button>
        </div>
        <div class="col-sm-6 text-right">
        @if($isUser == 1)
                @if($post->post_answer_id && $post->post_answer_id != -1)
                    @if($contents->id == $post->post_answer_id)
                        <li><i class="fa fa-check justify-content-center"></i>この専門家の回答で解決</li>
                    @endif
                @else
                    <button class="yellow-btn-220-40" id="answered{{$contents->id}}">この専門家の回答で解決</button>
                @endif
        @endif
        </div>
    </div>
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
