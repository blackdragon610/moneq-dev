@extends('layouts/front', ["type" => 1])


@section('main')

    @if (!empty($mode))
        @if ($mode == "notsee")
            閲覧不可
        @endif
    @else
        エラー
    @endif
@endsection
