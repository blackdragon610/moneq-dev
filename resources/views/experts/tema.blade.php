<div class="row">
    <div class="container-fluid whitepanel" style="padding-top:48px">
        @include('layouts.parts.custom.userinfodetail', ["type" => "userinfodetail", 'name' => 'userinfo', 'contents' => $expert])
    </div>
</div>

<div class="row">
    <div class="container-fluid whitepanel">
        <p class="title-22px">テスト太郎さんの回答一覧</p>
        
        @foreach ($answers as $item)
            @include('layouts.parts.custom.expertanswer', ["type" => "answer1", 'name' => 'answer1', 'contents' => $item])
        @endforeach
    </div>
</div>
