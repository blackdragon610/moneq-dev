@extends('layouts/front', ["type" => 1])

@section('main')

<div class="whitepanel">
    <div class="container">

        <div class="container-fluid p-0 bg-white" style="margin-top:10px">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item">
                    <img src="/images/svg/image-fa-edit-regular.svg" style="margin-right:4px">
                    <a href="{{url('/other/access')}}" style="color:#9B9B9B">相談の投稿</a>
                </li>
                <li class="breadcrumb-item">完了</li>
            </ol>
        </div>

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12 col-lg-12 bg-white">

                <p class="title-medium">相談の投稿の完了</p>

                {{Form::open(['url'=> route('post.detail', $postId),'method'=>'GET', 'files' => false, 'id' => 'form'])}}
                    <div class="container">
                        <div class="col text-center">
                            <p class="title-16px">相談投稿を完了しました。</p>
                            <p class="title-16px">専門家から回答が来るまで少々お待ちください。</p>
                            <p class="title-16px">相談の詳細は下記から確認できます。</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center btnLayer">
                            <button class="btnSubmit btnUnselected">相談詳細に戻る</button>
                        </div>
                    </div>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>
@endsection
