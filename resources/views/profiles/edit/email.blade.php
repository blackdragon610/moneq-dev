@extends('layouts/front', ["type" => 1])


@section('main')
<div class="lightgreypanel">
    <div class="container p-3">

        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12 bg-white">         
                    <h5 class="font-weight-bold p-2">メールアドレス</h5>
                    <hr class="mt-2 mb-3"/>

                    {{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <section>
                            @include('layouts.parts.editor.text', ["type" => "email", 'name' => 'email', 'contents' => 'class="form-control" placeholder="メールアドレスを入力"'])<br />
                        </section>

                        <section>
                            <div class="d-flex justify-content-end">
                                <button class="btnSubmit">次へ</button>
                            </div>
                        </section>
                    {{Form::close()}}

                    {{Form::open(['url'=> route('profile.updatePlus'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <section style="position:absolute; bottom:0px;">
                            <button class="btnUnselected">会員情報に戻る</button>
                        </section>
                    {{Form::close()}}

                </div>            
            </div>

        </section>

    </div>
</div>

@endsection
