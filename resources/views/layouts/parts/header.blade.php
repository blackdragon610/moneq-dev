<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="http://placehold.it/70x70?text=Savee" alt="">
    </a>

    <div class="nav navbar-nav navbar-right">
        <div class="btn-toolbar">
            <a href="{{ url('/register') }}" class="btn btn-outline-orange mx-2">@lang('string.register')</a>
            <a href="{{ url('/login') }}" class="btn btn-outline-red">@lang('string.login')</a>
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
                    <a href="#" class="btn btn-danger offset-sm-3 col-sm-3">@lang('string.consult_btn')</a>
                </div>
            </form>
        </div>
    </div>
</div>