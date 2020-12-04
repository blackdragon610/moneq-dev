@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

        <div class="row" style="margin-bottom:80px" >
            <div class="col-md-12 col-lg-12 bg-white">
                <p class="title-medium">メールアドレス</p>
                <!-- <hr class="mt-2 mb-3"/> -->

                {{Form::open(['url'=> route('profiles.email.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                    <section>
                        @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email',
                                'contents' => 'class="form-control" placeholder="メールアドレス"
                                               style="border: 1px solid #707070"'])
                    </section>

                    <section>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('profiles.manage')}}" class="btnUnselected" style="width:300px">会員情報に戻る</a>
                            <button class="btnSubmit" style="width:300px;height:50px;background-color:#FFD800;color:black">変更を送信</button>
                        </div>
                    </section>
                {{Form::close()}}

            </div>
        </div>

    </div>
</div>

@endsection
