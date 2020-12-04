@extends('layouts/front', ["type" => 1])

@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">

                <p class="title-medium">相談の投稿の完了</p>

                {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <div class="container">
                        <div class="col text-center">
                            <p class="title-16px">相談投稿を完了しました。</p>
                            <p class="title-16px">専門家から回答が来るまで少々お待ちください。</p>
                            <p class="title-16px">相談の詳細は下記から確認できます。</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center btnLayer">
                            <a href="{{route("post.detail", $postId)}}" class="btnSubmit btnUnselected">相談詳細へ</a>
                        </div>
                    </div>
                {{Form::close()}}

            </div>
        </div>
        
    </div>
</div>
@endsection
