@extends('layouts/front', ["type" => 1])


@section('main')

<div class="container-fluid lightgreypanel p-3">
    <div class="container bg-white p-3">

        <h5 class="font-weight-bold">相談の投稿</h5>
        <hr class="mt-2 mb-4"/>
        <div class="container-fluid">
            <div class="row pl-2">
                <span class="name">今月はあと 3回 相談ができます。</span>
                <span class="age">再質問権 0件</span>
            </div>
        </div>

        {{Form::open(['url'=> route('post.store'),'method'=>'POST', 'files' => false, 'id' => 'form'])}}
            <section>
                <div class="container-fluid pl-2">
                    <p><a href="#" class="text-dark" target="_blank"><i class="fa fa-warning"></i> はじめて専門家に相談する方へ</a></p>
                    <p><a href="#" class="text-dark" target="_blank"><i class="fa fa-stop"></i> 相談の禁止事項</a></p>
                    <p>よくある相談の禁止事項</p>
                    <ul>
                        <li><i class="fa fa-check"></i>個人情報の記載</li>
                        <li><i class="fa fa-check"></i>特定の企業、商品、サービスに関する記載</li>
                        <li><i class="fa fa-check"></i>違法行為・犯罪に関連する投稿</li>
                        <li><i class="fa fa-check"></i>質問や回答と関係のないURLの記載</li>
                        <li><i class="fa fa-check"></i>お礼や報告など質問ではない投稿</li>
                    </ul>
            <section>
                <label for="" >相談テーマ</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'post_name',  'contents' => 'placeholder="例：お金のことで相談がある"'])<br />
            </section>

            <section>
                <label for="" >カテゴリ</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.select', ['name' => 'sub_category_id',  "file" => $categories, "keyValue" => "", "contents" => ""])<br />
            </section>

            <section>
                <div class="row">
                    <article class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 p-2">
                        <div class="container-fluid">
                                    <p>【資産運用】</p>
                                    <div class="row">
                                        <span><a href="#" class="pr-3 text-dark">お金の貯め方全般</a></span>
                                        <span><a href="#" class="pr-3 text-dark">貯金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">定期預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">外貨預金</a></span>
                                        <span><a href="#" class="pr-3 text-dark">積立株式投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">NISA</a></span>
                                        <span><a href="#" class="pr-3 text-dark">投資信託</a></span>
                                        <span><a href="#" class="pr-3 text-dark">ETF</a></span>
                                        <span><a href="#" class="pr-3 text-dark">REITFX</a></span>
                                        <span><a href="#" class="pr-3 text-dark">金投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">CFD</a></span>
                                        <span><a href="#" class="pr-3 text-dark">先物取引</a></span>
                                        <span><a href="#" class="pr-3 text-dark">仮想通貨不動産投資</a></span>
                                        <span><a href="#" class="pr-3 text-dark">賃貸経営</a></span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
            <section>
                <label for="" >相談内容</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.textarea', ['name' => 'body', "contents" => ""])<br />
            </section>
            <section>
                <label for="" >タグ</label><span class="text-danger">(必須)</span>
                @include('layouts.parts.editor.text', ["type" => "text", 'name' => 'tag',  'contents' => 'placeholder=""'])<br />
            </section>

            <section>
                <div class="row">
                    <div class="col text-center btnLayer">
                        @if (!empty($isConfirmation))
                            {!! Form::submit('修正', ['class' => 'btnSubmit', 'name' => 'reInput']) !!}
                            {!! Form::submit('確定', ['class' => 'btnSubmit', 'name' => 'end']) !!}
                        @else
                            <button class="btnSubmit">一時保存</button>
                            <button class="btnSubmit">相談を投稿</button>
                        @endif
                    </div>
                </div>
            </section>

        {{Form::close()}}


    </div>
</div>

@endsection
