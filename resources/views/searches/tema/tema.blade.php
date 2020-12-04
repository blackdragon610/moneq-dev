<div class="container-fluid p-0 bg-white">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item">"{{$keyword}}" の検索結果</li>
    </ol>
</div>
<div class="container-fluid p-0">
    <div class="d-flex pt-2">
        <h5 class="font-weight-bold text-danger mright"><?php if($keyword) echo $keyword; else echo 'お金の相談テーマから探す';?>に該当する相談</h5>
        <span class="mright">検索結果数</span>
        <span class="text-danger">{{$posts->total()}}</span>
        <div class="dropdown ml-auto">
            <button class="btn yellow-btn-106-35 dropdown-toggle" type="button"
                    id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    並べ替え
            </button>
            <ul class="dropdown-menu dropdown-menu-right checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
                <li ><label><a id="order1" class="dropdown-item waves-effect waves-light"> 評価順</a></li>
                <li ><label><a id="order2" class="dropdown-item waves-effect waves-light"> 閲覧数順</a></li>
                <li ><label><a id="order3" class="dropdown-item waves-effect waves-light"> 新着順</a></li>
            </ul>
        </div>
    </div>
</div>

<hr class="mt-2 mb-3"/>
@foreach($posts as $post)
    @include('layouts.parts.custom.otherarticle', ["type" => "article", 'name' => 'article', 'contents' => $post, 'gender'=>$gender])
@endforeach
<div class="row justify-content-center">{{$posts->links()}}</div>

<script>

    $('#order1').click(function(){
        $('#order').val(1);
        loadMoreData(1);
    });

    $('#order2').click(function(){
        $('#order').val(2);
        loadMoreData(2);
    });

    $('#order3').click(function(){
        $('#order').val(3);
        loadMoreData(3);
    });

</script>
