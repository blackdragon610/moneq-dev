<div class="moneq-navbar fixed-top">
    <div class="row align-items-center" style="overflow: visible;">

            <nav class="navbar navbar-expand-sm navbar-light p-0 col-12">
            <a href="/"><img src="{{ url('/images/svg/img-logo-with-title.svg') }}" id="logo"></a>
            <span id="title">お金の悩み相談サービス「マネク」</span>

            <!-- AFTER LOGIN -->
            @if(Cookie::has('custom_token'))
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                <ul class="navbar-nav ml-auto nav-flex-icons" style="padding-right:40px">
                    <li class="nav-item dropdown" id="badgeNav">
                        <a id="badge" class="nav-link waves-effect waves-light" id="navbarDropdownBell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell fa-lg has-badge" style="color:black"></i>
                        </a>
                        <div id="contents" class="dropdown-menu dropdown-menu-right dropdown-default speech-popup" aria-labelledby="navbarDropdownBell"
                                >
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-lg" style="color:black"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default speech-popup" aria-labelledby="navbarDropdownUser"
                            style="padding:15px !important; width:200px !important">
                            <a class="dropdown-item label-12px" style="padding:0px; padding-bottom:6px !important" href="{{route('search.tema')}}">
                                <img src="/images/svg/img-fa-search.svg" style="margin-right:8px">@lang('string.tema_search')</a>
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{route('search.category')}}">
                                <img src="/images/svg/img-fa-search.svg" style="margin-right:8px">@lang('string.money_free')</a>
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{route('search.expert')}}">
                                <img src="/images/svg/img-fa-search.svg" style="margin-right:8px">@lang('string.expert_search')</a>
                            @if(\Auth::user()->pay_status != 1)
                                <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{url('other/self')}}">
                                    <img src="/images/svg/img-fa-history.svg" style="margin-right:8px">@lang('string.post_in')</a>
                            @endif
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{url('other/access')}}">
                                <img src="/images/svg/img-fa-history.svg" style="margin-right:8px">@lang('string.search_history')</a>
                            @if(\Auth::user()->pay_status != 1)
                                <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{url('other/store')}}">
                                    <img src="/images/svg/img-fa-save.svg" style="margin-right:8px">@lang('string.saved')</a>
                            @endif
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="{{route('profiles.manage')}}">
                                <img src="/images/svg/img-fa-edit-regular.svg" style="margin-right:8px">@lang('string.infomation')</a>
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="#">
                                <img src="/images/svg/img-fa-help.svg" style="margin-right:8px">@lang('string.help')</a>
                            <a class="dropdown-item label-12px p-0"  style="padding:0px; padding-bottom:6px !important" href="#">
                                <img src="/images/svg/img-fa-envelope.svg" style="margin-right:8px">お問い合わせ</a>
                            <hr class="m-2">
                            <a class="dropdown-item label-12px p-0"  style="padding:0px !important" href="{{route('logout')}}">ログアウト</a>
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
    {{-- <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" style="float: right;">
        <div class="toast-header">
            <strong class="mr-auto">OK!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div> --}}

</div>
<div class="behind-bar">
    <!-- 70px bar  -->
</div>
@if(!isset($isTop))
<div class="container-fluid" style="background-color:#FFD800">
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
            </div>
        </div>
    {{Form::close()}}
</div>
@endif
<script>
    var myVar = setInterval(myTimer, 1000);
    var myPTime = setInterval(myPost, 10000); //86400000

    function myTimer() {
        $.ajax({
            type:"GET",
            url: "{{url('notification')}}",
            success: function(response) {
                if(response == 0){
                    $('#contents').attr('style','display:none');
                }else   $('#contents').attr('style','display:show;padding:15px !important; width:430px !important');
                var count = 0;
                var bodyHtml = '';
                for(i in response){
                    if(i == 'count'){
                        count = response[i][0]['count'];
                    }
                    if(i == 'notification'){
                        bodyArray = response[i];
                        for(j in bodyArray){
                            bodyHtml += '<a href="{{url('notification/route')}}'+ '/' + bodyArray[j]['type'] + '/' + bodyArray[j]['id']+'" class="text-dark">' +
                                            '<div class="col-12" style="border-bottom: 1px solid #dbdbdb">' +
                                                '<div class="row">' +
                                                    '<div class="row container-fluid">' +
                                                        '<img src="/images/img-avatar-sample.png" id="avatar" style="width:50px;height:50px"/>' +
                                                        '<div class="col">' +
                                                            '<p class="label-10px m-0 p-0" style="margin-top:5px !important">高橋</p>' +
                                                            '<p class="label-11px m-0 p-0">' + bodyArray[j]['sub_name'] + '</p>' +
                                                            '<p class="label-12px m-0 p-0" style="color:#777777;margin-bottom:5px !important">' +
                                                              bodyArray[j]['post_name'] + 'に関して、'+ bodyArray[j]['ext_name']+ 'さんからメッセージがありました。</p>'
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '</a>';
                        }
                    }
                }
                if(count != 0){
                    var htmlBadge = '<i class="fa fa-bell fa-lg has-badge" style="color:black" data-count="'+ count + '" ></i>'
                    $('#badge').empty().html(htmlBadge);
                }else{
                    var htmlBadge = '<i class="fa fa-bell fa-lg has-badge" style="color:black"></i>'
                    $('#badge').empty().html(htmlBadge);
                }
                if(bodyHtml != '')
                    bodyHtml += '<a class="dropdown-item label-12px p-0 text-center"  style="padding:2px !important" href="{{route('logout')}}">' +
                            '<u>すべてのメッセージを見る</u> </a>';

                $('#contents').empty().html(bodyHtml);
            }
        });
    }

    function myPost() {
        $.ajax({
            type:"GET",
            url: "{{url('repost')}}",
            success: function(response) {
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

        $('#gotoPro').click(function(){
            location.href = "{{route('profiles.manage')}}";
        })

    });


</script>
