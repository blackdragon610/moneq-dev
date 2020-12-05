@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <!-- <section> -->
                <div class="sticky-top m-2">
                    @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => ''])
                </div>
            <!-- </section> -->
        </div>

        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            @include('experts.tema', ["type" => "search", 'name' => 'rightpane', 'contents' => ''])
        </div>
    </div>


    </div>
</div>




@endsection
