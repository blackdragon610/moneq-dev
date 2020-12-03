@extends('layouts/front', ["type" => 1])


@section('main')
<div class="container whitepanel p-3">
    <div class="row">
        <!-- right sticky sidebar -->
        <div class="col-12 col-sm-3 order-sm-2 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                @include('searches.category.search-rightpane', ["type" => "search", 'name' => 'rightpane', 'contents' => '', 'spec'=>$spec,
                                                                "categories"=>$categories])
            </div>
        </div>
        <!-- main -->
        <div class="col-12 col-sm-9 order-sm-1 order-2" id="main">
            @include('searches.category.tema', ['name' => 'main', 'posts' => $posts, 'gender'=>$gender, 'keyword'=>$keyword, 'category_name'=>$category_name])
        </div>
    </div>
</div>

@if($category_name != '')
<script>
    $(document).ready(function(){
        $('#tema').tagsinput({
            allowDuplicates: false,
            itemValue: 'val',  // this will be used to set id of tag
            itemText: 'label' // this will be used to set text of tag
        });

        $('#tema').tagsinput('add', { val: "{{'3333-'.$category}}" , label: "{{$category_name}}"});

    })
</script>
@endif


@endsection
