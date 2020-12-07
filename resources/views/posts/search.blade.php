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
            <!-- <section> -->
                <!-- {{Form::open(['url'=> route('entry.password.end'),'method'=>'POST', 'files' => false, 'id' => 'form'])}} -->
                    <!-- <div class="container-fluid bg-white"> -->
                        <!-- <div class="col-sm-12 m-2"> -->
                            <div class="container-fluid">
                                <div class="d-flex pt-2">
                                    <h5 class="font-weight-bold text-danger mright">保険に該当する相談</h5>
                                    <span class="mright">検索結果数</span>
                                    <span class="text-danger">1000</span>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-default dropdown-toggle" type="button" 
                                                id="dropdownMenu1" data-toggle="dropdown" 
                                                aria-haspopup="true" aria-expanded="true">
                                                並べ替え<i class="glyphicon glyphicon-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">  
                                            <li ><label><input type="checkbox"> 評価順</label></li>
                                            <li ><label><input type="checkbox"> 閲覧数順</label></li>
                                            <li ><label><input type="checkbox"> 新着順</label></li>                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>      
                            
                            <hr class="mt-2 mb-3"/>

                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        
                            @include('layouts.parts.custom.article', ["type" => "article", 'name' => 'article', 'contents' => ''])                        

                        <!-- </div>     -->
                    <!-- </div> -->
                <!-- {{Form::close()}} -->
            <!-- </section> -->

        </div>
    </div>
</div>




@endsection
