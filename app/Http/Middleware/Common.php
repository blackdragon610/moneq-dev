<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class Common
{
    /**
     * 共通処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role){

        $name = Route::current()->getName();


        View::share("commonSiteTitle", config("app")["siteTitle"]);
        View::share('commonPageName', $name);

        $isExpert = getIsExpert();
        \View::share("isExpert", $isExpert);
        $request->attributes->add(['expert' => $isExpert]);



        return $next($request);
    }
}
