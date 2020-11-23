@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container-fluid lightgreypanel p-3">
    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <!-- <section> -->
                <div class="sticky-top bg-white m-2">
                    <div class="nav flex-column">
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                        <a href="#_" class="nav-link">Link</a>
                    </div>
                </div>
            <!-- </section> -->
        </div>
        
        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            <div class="lightgreypanel">
                <section>
                    <div class="container-fluid bg-white">
                        @include('layouts.parts.custom.articledetail', ["type" => "articledetail", 'name' => 'article', 'contents' => ''])
                    </div>
                </section>
            </div>

            <div class="lightgreypanel">
                <section>
                    <div class="container-fluid bg-white">
                        <h5 class="font-weight-bold p-2">2名の専門科が回答しています</h5>
                        <hr class="mt-2 mb-3"/>
                        @include('layouts.parts.custom.answer', ["type" => "answer", 'name' => 'answer', 'contents' => ''])
                    </div>

                </section>
            </div>

        </div>


    </div>
</div>




@endsection
