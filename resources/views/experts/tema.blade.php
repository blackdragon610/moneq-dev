<div style="margin-top:18px">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item">
            <img src="/images/svg/image-fa-comments.svg" style="margin-right:4px">
            <a href="{{url('/expert')}}" style="color:#9B9B9B">相談</a>
        </li>
        <li class="breadcrumb-item">
            保険のことで質問です
        </li>
    </ol>
</div>
<div class="container-fluid whitepanel mt-5 p-0">


    @include('layouts.parts.custom.expertinfodetail', ["type" => "userinfodetail", 'name' => 'userinfo', 'contents' => $expert])

    <p class="title-22px mt-5 col-12">テスト太郎さんの回答一覧</p>

    @foreach ($contents as $item)
        @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item, 'gender'=>$gender])
    @endforeach

</div>
