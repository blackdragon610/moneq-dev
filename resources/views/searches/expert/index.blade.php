@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container whitepanel p-3">
    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                @include('searches.expert.experts-rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => '', 'spec'=>$spec])
            </div>
        </div>
        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            @include('searches.expert.tema', ['name' => 'main', 'experts' => $experts, 'gender'=>$gender])
        </div>
    </div>
</div>


@endsection
