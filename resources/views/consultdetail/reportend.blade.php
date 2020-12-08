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

                    <div style="margin-top:18px">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <img src="/images/svg/image-fa-comments.svg" style="margin-right:4px">
                                <a href="{{url('/expert')}}" style="color:#9B9B9B">相談</a>
                            </li>
                            <li class="breadcrumb-item">
                                保険のことで質問です
                            </li>
                            <li class="breadcrumb-item">
                                通報
                            </li>
                        </ol>
                    </div>

                    <p class="title-medium">通報の完了</p>
                    <p class="title-16px text-center">「{{$post->post_name}}」の通報が完了しました。</p>

                    <div class="row">
                        <div class="col text-center btnLayer">
                            <a class="btn btnSubmit btnUnselected" href="{{url('/')}}" style="width:300px !important">トップ</a>
                        </div>
                    </div>

                </div>
            </div>


    </div>
</div>

@endsection
