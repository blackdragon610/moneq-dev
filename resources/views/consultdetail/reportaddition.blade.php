@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p class="keepTwoLine">「<span><b>保険のことで質問です<b></span>」の内容に追記します</p>

                    {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <label for="question">質問</label>
                        <p name="question">主人の生命保険のことで相談があります。がん保険は入ったほうがよろしいでしょうか？主人の生命保険のことで相
談があります。がん保険は入ったほうがよろしいでしょうか？主人の生命保険のことで相談があります。がん保険は入ったほうがよろしいでしょうか？主人の生命保険のことで相談があります。がん保険は入ったほうがよろしいでしょうか？主人の生命保険のことで相談があります。がん保険は入ったほうがよろしいでしょうか？がん保険は入ったほうがよろしいでしょうか？がん保険は入ったほうがよろしいでしょうか？がん保険は入ったほうがよろしいでしょうか？
</p>
                        <p>相談の追記</p>
                        <textarea rows = "5" cols = "100%" name = "description">
                        </textarea><br>
                    <section>
                        <div class="row">
                            <div class="col text-center btnLayer">
                                <button class="btnSubmit">相談の追記を送信</button>
                            </div>
                        </div>
                    </section>
                    {{Form::close()}}

                </div>
            </div>

        </section>
    </div>
</div>

@endsection
