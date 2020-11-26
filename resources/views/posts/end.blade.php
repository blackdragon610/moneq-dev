@extends('layouts/front', ["type" => 1])

@section('main')

<div class="container-fluid lightgreypanel p-3">
    <div class="container p-3 bg-white">
        <section>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h5 class="font-weight-bold p-2">相談の投稿の完了</h5>
                    <hr class="mt-2 mb-3"/>
                    {{Form::open(['url'=> route('profile.update'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
                        <section>
                            <div class="container">
                                <div class="col text-center">
                                    <p>相談投稿を完了しました。</p>
                                    <p>専門家から回答が来るまで少々お待ちください。</p>
                                    <p>相談の詳細は下記から確認できます。</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <a href="{{route("post.detail", $postId)}}" class="btnSubmit">相談詳細へ</a>
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
