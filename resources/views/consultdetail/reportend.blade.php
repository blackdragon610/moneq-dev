@extends('layouts/front', ["type" => 1])


@section('main')
<div class="whitepanel">
    <div class="container">

            <div class="row">
                <!-- right sticky sidebar -->
                <div class="col-12 col-sm-3 order-sm-2" id="sticky">
                    <!-- <section> -->
                    {{-- @include('experts.rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => '']) --}}
                    <!-- </section> -->
                </div>

                <div class="col-12 col-sm-9 order-sm-1 pl-0" id="main">
                    <p class="keepTwoLine">「<span><b>{{$post->post_name}}</b></span>」の通報が完了しました。</p>

                        <section>
                            <div class="row">
                                <div class="col text-center btnLayer">
                                    <a class="btnSubmit" href="{{url('/')}}">トップ</a>
                                </div>
                            </div>
                        </section>

                </div>
            </div>


    </div>
</div>

@endsection
