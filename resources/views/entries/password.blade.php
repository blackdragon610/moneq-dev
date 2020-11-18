@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3">

    {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
    <div class="row">
        <div class="col-md-12 col-lg-12 bg-white">
            <h5 class="font-weight-bold p-2">パスワードの入力</h5>
            <hr class="mt-2 mb-3"/>

            <label for="password">パスワード</label><span class="text-danger">(必須)</span>
            @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password', 'contents' => 'class="form-control" placeholder="パスワードを入力"'])<br />

            <label for="password_conform">パスワード(確認用)</label><span class="text-danger">(必須)</span>
            @include('layouts.parts.editor.text', ["type" => "password", 'name' => 'password_confirmation', 'contents' => 'class="form-control" placeholder="パスワードを確認用を入力"'])<br />

        </div>    
    </div>
    <div class="row mt-4">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <article class="bg-white">
                <h5 class="font-weight-bold mb-2">年払会員 (3,980円/年)</h5>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>️️月最大3回お金の専門家に相談が可能</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                <div class="col text-center">
                    <a href="#" class="btn btn-danger mx-2">選択中</a>
                </div>
            </article>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <article class="bg-white">
                <h5 class="font-weight-bold mb-2">月払会員 (330円/月)</h5>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>月最大1回お金の専門家に相談が可能</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>1つの質問につき最大3回まで追加質問が可能</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>過去Q&Aはすべて見放題</p>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>回答したお金の専門家に具体的な有料相談を行うことが可能</p>
                <div class="col text-center">
                    <a href="#" class="btn btn-outline-dark mx-2">選択する</a>
                </div>
            </article>
        </div>

        <!-- <input type="radio" name="pay_status" value="1">無料<br />
        <input type="radio" name="pay_status" value="2">年払会員<br />
        <input type="radio" name="pay_status" value="3">月払会員<br /> -->

    </div>
    <div class="row mt-4">
        <div class="col-sm-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6">
            <article class="bg-white">
                <h5 class="font-weight-bold mb-2">無料会員</h5>
                <p><i class="fa fa-6x fa-check color-primary margin-b-20"></i>月最大3回までQ&Aが見れる</p>
                <div class="col text-center">
                    <a href="#" class="btn btn-outline-dark mx-2">選択する</a>
                </div>
            </article>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col text-center">
            <button class="bg-dark text-white p-3 pl-5 pr-5">次へ</button>
        </div>
    </div>
    {{Form::close()}}

    </div>
</div>
@endsection
