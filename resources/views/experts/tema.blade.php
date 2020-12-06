<div class="container-fluid whitepanel mt-5 p-0">
    @include('layouts.parts.custom.expertinfodetail', ["type" => "userinfodetail", 'name' => 'userinfo', 'contents' => $expert])

    <p class="title-22px mt-5 col-12">テスト太郎さんの回答一覧</p>

    @foreach ($contents as $item)
        @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item, 'gender'=>$gender])
    @endforeach

</div>
