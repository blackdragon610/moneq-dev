@extends('layouts/admin', ['pageType' => 1, 'isLayoutEdit' => true])

@section('main')
    <section class="content">

        <div class="box">
            <div class="box-body">
                <section class="content-header">
                    <h1>登録/編集</h1>

                </section>

                <p class="mt text-center">
                    登録/編集が完了しました。
                </p>

                <div class="mt-lg text-center">
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-lg">一覧に戻る</a>
                </div>
                <br />
            </div>
	    </div>
	</section>
@endsection
