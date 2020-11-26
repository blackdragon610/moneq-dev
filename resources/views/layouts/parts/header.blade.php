<div class="moneq-navbar fixed-top">
    <div class="row align-items-center" style="overflow: visible;">

            <nav class="navbar navbar-expand-sm navbar-light p-0 col-12">
            <img src="{{ url('/images/svg/img-logo-v2.svg') }}" id="logo">
            <!-- <span id="title">お金の悩み相談サービス「マネク」</span> -->

            <!-- AFTER LOGIN -->
            @if(Cookie::has('token'))
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                <ul class="navbar-nav ml-auto nav-flex-icons" style="padding-right:40px">
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownBell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o fa-lg has-badge" data-count="2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownBell">
                            <a class="dropdown-item waves-effect waves-light" href="#">○○○に関して、○○○さんからメッセージがありました。</a>
                            <a class="dropdown-item waves-effect waves-light" href="#">○○○に関して、○○○さんから回答がありました。</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-o fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownUser">
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.tema_search')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.money_free')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.expert_search')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.post_in')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.search_history')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.saved')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('profiles.manage')}}">@lang('string.infomation')</a>
                            <hr>
                            <a class="dropdown-item waves-effect waves-light" href="#">@lang('string.help')</a>
                        </div>
                    </li>
                </ul>
            </div>
            @endif

            <!-- Before LOGIN  -->
            @if(!Cookie::has('token'))
            <div class="nav navbar-nav ml-auto p-0">
                <div class="btn-toolbar d-flex justify-content-end p-0 align-items-center">
                    <a href="{{ url('/entry') }}" id="btnRegister"><span class="bdyellow">@lang('string.register')</span></a>
                    <a href="{{ url('/login') }}" class="btn" id="btnLogin">@lang('string.login')</a>
                </div>
            </div>
            @endif
        </nav>

    </div>
</div>
<div class="behind-bar"> 
    <!-- 70px bar  -->
</div>

<div class="container-fluid yellowpanel">
    <form action="#" method="post">
        <div class="container" style="height:74px">
            <div class="row">

                <div class="input-group" id="searchbar">
                    <input type="text" placeholder="お金の悩みを検索">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary">
                            <i class="fa fa-search fa-1x"></i>
                        </button>
                    </div>
                    <a href="#" class="btn orange-btn-200-50 ml-auto">@lang('string.consult_btn')</a>
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
    </form>
</div>
