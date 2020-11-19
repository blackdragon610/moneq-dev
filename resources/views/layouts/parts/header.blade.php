<nav class="navbar navbar-expand-sm navbar-light bg-white">
    <a class="navbar-brand" href="#">
        <img src="{{ url('/images/logo.png') }}" alt="">
    </a>
    <div class="nav navbar-nav col-sm-5 col-5 mr-auto">
        <span class="align-middle font-weight-bold text-center" style="min-width:240px; max-width:240px">お金の悩みに専門家が回答するお金相談サービス「MoneQ（マネク）」</span>
    </div>

    <!-- AFTER LOGIN -->
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown">
                <a class="nav-link waves-effect waves-light" id="navbarDropdownBell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell-o fa-lg has-badge" data-count="4"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownBell">
                    <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                    <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link waves-effect waves-light" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-o fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownUser">
                    <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                    <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                    <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div> -->

    <!-- Before LOGIN  -->
    <div class="nav navbar-nav ml-auto">
        <div class="btn-toolbar d-flex justify-content-end">
            <a href="{{ url('/entry') }}" class="btn btn-outline-orange font-weight-bold">@lang('string.register')</a>
            <a href="{{ url('/login') }}" class="btn btn-outline-red font-weight-bold ml-md-2 ml-2">@lang('string.login')</a>
        </div>   
     </div>
</nav>
    
<div class="container-fluid yellowpanel">
    <div class="row">
        <div class="container-fluid">
            <form action="#" method="post">
                <div class="input-group pb-2 pt-2">
                    <input class="form-control py-1 col-sm-6" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search text-grey"></i></span>
                    </div>
                    <a href="#" class="btn btn-danger offset-sm-2 col-sm-4 offset-md-3 col-md-3 mt-2 mt-sm-0">@lang('string.consult_btn')</a>
                </div>
            </form>
        </div>
    </div>
</div>