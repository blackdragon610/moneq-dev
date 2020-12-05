<div class="container-fluid whitepanel pl-0" style="padding-top:48px">
    @include('layouts.parts.custom.userinfodetail', ["type" => "userinfodetail", 'name' => 'userinfo', 'contents' => $expert])

    <div class="row" style="padding-left:15px">
        <p class="title-22px" style="margin-top:48px">テスト太郎さんの回答一覧</p>
        
        @foreach ($contents as $item)
            @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item])
            @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item])
            @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item])
        @endforeach
    </div>  

</div>
