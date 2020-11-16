@extends('layouts/front', ["type" => 1])


@section('main')

    相談投稿を完了しました。<br />
    専門家から回答が来るまで少々お待ちください。<br />
    相談の詳細は下記から確認できます。<br /><br />

    <a href="{{route("post.detail", $postId)}}">相談詳細へ</a>
@endsection
