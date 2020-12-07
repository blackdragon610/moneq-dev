<article class="col-12 p-0 bg-white">

    <div id="article">
        <div class="row">
            <div class="col pad0 text-center" style="max-width: 80px">
                <a href="{{route('expert.detail', $contents->expert_id)}}">
                    <img src="/images/svg/component-user.svg">
                </a>
            </div>
            <div class="col-sm-6">
                <div id="expert-name">{{$contents->expert->expert_name_second}}</div>
                <div class="col p-0">
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
            <div class="container" style="opacity:0.1">
        @else
            <div class="container">
        @endif
                <p id="description">{{$item->body}}</p>
        </div>
        <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-default" type="button" id="dataHelp{{$contents->id}}">
                <i class="fa fa-heart-o <?php if(count($contents->postData()) > 0) echo 'fa_custom'?>" aria-hidden id="category"></i> 役に立った
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
                    // $('.toast').toast('show');
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
