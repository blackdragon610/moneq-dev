<div class="moneq-navbar fixed-top">
    <div class="row align-items-center" style="overflow: visible;">

            <nav class="navbar navbar-expand-sm navbar-light p-0 col-12">
            <a href="/"><img src="{{ url('/images/svg/img-logo-v2.svg') }}" id="logo"></a>
            <!-- <span id="title">お金の悩み相談サービス「マネク」</span> -->

            <!-- AFTER LOGIN -->
            @if(Cookie::has('custom_token'))
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                <ul class="navbar-nav ml-auto nav-flex-icons" style="padding-right:40px">
                    <li class="nav-item dropdown" id="badgeNav">
                        <a id="badge" class="nav-link waves-effect waves-light" id="navbarDropdownBell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o fa-lg has-badge"></i>
                        </a>
                        <div id="contents" class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownBell">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-o fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownUser">
                            <a class="dropdown-item waves-effect waves-light" href="{{route('search.tema')}}">@lang('string.tema_search')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('search.category')}}">@lang('string.money_free')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('search.expert')}}">@lang('string.expert_search')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="<?php if(\Auth::user()->pay_status != 1) echo url('other/self'); else echo '#';?>">@lang('string.post_in')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{url('other/access')}}">@lang('string.search_history')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="<?php if(\Auth::user()->pay_status != 1) echo url('other/store'); else echo '#';?>">@lang('string.saved')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('profiles.manage')}}">@lang('string.infomation')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.help')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">お問い合わせ</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('logout')}}">ログアウト</a>
                        </div>
                    </li>
                </ul>
            </div>
            @endif

            <!-- Before LOGIN  -->
            @if(!Cookie::has('custom_token'))
            <div class="nav navbar-nav ml-auto p-0">
                <div class="btn-toolbar d-flex justify-content-end p-0 align-items-center">
                    <a href="{{ url('/entry') }}" id="btnRegister"><span class="bdyellow">@lang('string.register')</span></a>
                    <a href="{{ url('/login') }}" class="btn" id="btnLogin">@lang('string.login')</a>
                </div>
            </div>
            @endif
        </nav>

    </div>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" style="float: right;">
        <div class="toast-header">
            <strong class="mr-auto">OK!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

</div>
<div class="behind-bar">
    <!-- 70px bar  -->
</div>

<div class="container-fluid yellowpanel">
    {{Form::open(['url'=> route('search.tema'),'method'=>'GET', 'files' => false, 'id' => 'yform'])}}
        <div class="container" style="height:74px">
            <div class="row">

                <div class="input-group" id="searchbar">
                        <input type="text" placeholder="お金の悩みを検索" name="keyword" id="searchYellow">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search fa-1x"></i>
                            </button>
                        </div>
                    @if(Cookie::has('custom_token'))
                        <a href="{{route('post.create')}}" class="btn orange-btn-200-50 ml-auto">@lang('string.consult_btn')</a>
                    @else
                        <a href="{{route('entry')}}" class="btn orange-btn-200-50 ml-auto" >@lang('string.consult_btn')</a>
                    @endif

                </div>

                <!-- <div class="input-group pb-2 pt-2">
                    <input class="form-control py-1 col-sm-6" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search text-grey"></i></span>
                    </div>
                    <a href="#" class="btn btn-danger offset-sm-2 col-sm-4 offset-md-3 col-md-3 mt-2 mt-sm-0">@lang('string.consult_btn')</a>
                </div> -->


            </div>
        </div>
    {{Form::close()}}
</div>

<script>
    var myVar = setInterval(myTimer, 1000);
    var myPTime = setInterval(myPost, 10000); //86400000

    function myTimer() {
        $.ajax({
            type:"GET",
            url: "{{url('notification')}}",
            success: function(response) {
                var count = 0;
                var bodyHtml = '';
                for(i in response){
                    if(i == 'count'){
                        count = response[i][0]['count'];
                    }
                    if(i == 'notification'){
                        bodyArray = response[i];
                        for(j in bodyArray){
                            bodyHtml += '<a class="dropdown-item waves-effect waves-light" href="{{url('notification/route')}}'+ '/'
                                     + bodyArray[j]['type'] + '/' + bodyArray[j]['id']+'">'+bodyArray[j]['post_name'] + 'に関して、'+ bodyArray[j]['ext_name']+ 'さんから回答がありました。' +'</a>'
                        }
                    }
                }
                if(count != 0){
                    var htmlBadge = '<i class="fa fa-bell-o fa-lg has-badge" data-count="'+ count + '" ></i>'
                    $('#badge').empty().html(htmlBadge);
                }else{
                    var htmlBadge = '<i class="fa fa-bell-o fa-lg has-badge"></i>'
                    $('#badge').empty().html(htmlBadge);
                }
                $('#contents').empty().html(bodyHtml);
            }
        });
    }

    function myPost() {
        $.ajax({
            type:"GET",
            url: "{{url('repost')}}",
            success: function(response) {
                console.log('data');
            }
        });
    }

    $(document).ready(function(){

        $('#searchYellow').on('keyup', function(){

            var text = $('#searchYellow').val();

            $.ajax({

                type:"GET",
                url: "{{url('search')}}" + '/' + text,
                success: function(response) {
                    var keyArray= [];
                    response = JSON.parse(response);
                    for (var patient of response) {
                        keyArray.push(patient['keyword']);
                    }
                    $( "#searchYellow" ).autocomplete({
                        source: keyArray
                    });
                }
            });
        });

    });

</script>
