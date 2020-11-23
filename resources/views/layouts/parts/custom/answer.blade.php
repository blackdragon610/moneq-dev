<article class="col-12 p-1 bg-white">
    <div class="row">
        <div class="col-sm-2 pt-2">
            <img src="http://placehold.it/50x50?text=P" alt="">
        </div>
        <div class="col-sm-7 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="font-weight-bold">{{$item->expert->expert_name_second}}</h5>
                </div>
                <div class="row">
                    <img src="/images/insurance-icon.png" alt="">
                </div>
            </div>
        </div>

        <div class="col-sm-3 pt-2">
            <div class="container-fluid pl-0 pb-lg-1">
                <span class="mright keepTwoLine">{{$item->created_at->format('Y/m/d')}}</span>
            </div>
        </div>
    </div>
    <div class="container">
        <p>{{$item->body}}</p>
        <p>
            <a href="" class="text-dark">役に立った</a>
        </p>
    </div>
    <div class="col text-center ">
        <button class="btnSubmit">この専門家の回答で解決</button>
    </div>
</article>
