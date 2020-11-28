<article class="col-12">
    <div class="row">
        {{-- <p>{{$contents->category->sub_name}}</p> --}}
        <h5 class="font-weight-bold pl-2">{{$contents->post_name}}</h5>
        @if($contents->isAnswerCheck() != 0)
            <img src="/images/solved-icon.png" class="ml-auto">
        @else
            <p class="ml-auto">回答待ち</p>
        @endif
    </div>
    <div class="row">
        <span class="name">{{$contents->user->nickname}}さん</span>
        <span class="age">{{getEra($contents->user->date_birth).'/'.$gender[$post->user->gender]}}</span>
        <span class="answers">{{$contents->answerCount()}}名が回答</span>
        <span class="ml-auto pr-1">{{$post->created_at->format('Y/m/d')}}</span>
    </div>
    <div class="row">
        <p class="pt-2 keepTwoLine">{{$post->body}}</p>
    </div>
</article>
