@if($memberFlag == 1)
    <article class="col-12 p-1 bg-white" style="opacity:0.1">
@else
    <article class="col-12 p-1 bg-white">
@endif
    <div class="row">
        <div class="col-sm-1 pt-2">
            <img src="http://placehold.it/50x50?text=P" alt="">
        </div>
        <div class="col-sm-8 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="font-weight-bold">{{$contents->expert->expert_name_second}}</h5>
                </div>
                <div class="row">
                    <img src="/images/insurance-icon.png" alt="">
                </div>
            </div>
        </div>

        <div class="col-sm-3 pt-2">
            <div class="container-fluid pl-0 pb-lg-1">
                <span class="mright keepTwoLine">{{$contents->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
    </div>
    <div class="container">
        <p>{{$item->body}}</p>
        <p>
            <a href="" class="text-dark">役に立った</a>
        </p>
    </div>
    @if($isUser == 1)
        <div class="col text-center" name="answer" id="answer{{$contents->id}}">
            @if($postAnswerId)
                @if($contents->id == $postAnswerId)
                    <li><i class="fa fa-check"></i>この専門家の回答で解決</li>
                @endif
            @else
                <button class="btn btn-success" id="answered{{$contents->id}}">この専門家の回答で解決</button>
            @endif
        </div>
    @endif
</article>

<script>
    $('#answered' + {{$contents->id}}).on('click',function(){

        $.ajax({
            type: "GET",
            url: "{{url('/post/answer/')}}" + '/' + '{{$post->id}}' + '/{{$contents->id}}',
            success: function (data) {
                if(data == 1){
                    $('[name="answer"]').empty().html();
                    $('#answer' + {{$contents->id}}).html('<li><i class="fa fa-check"></i>この専門家の回答で解決</li>');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>
