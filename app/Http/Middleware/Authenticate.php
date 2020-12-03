<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guard = "user";

        if (getIsExpert()){
            $guard = "expert";
        }

        if (!Auth::guard($guard)->check()) {
            // 非ログインはログインページに飛ばす
            return redirect('/login');
        }
    // if(\Cookie::has('custom_token')){
    //         // dd('dsf');
    //         if (!Auth::guard($guard)->check()) {
    //             // 非ログインはログインページに飛ばす
    //             return redirect('/login');
    //         }
    //     }else{
    //         Auth::logout();
    //         $request->session()->flush();
    //         $request->session()->regenerate();
    //         return redirect('/login');

    //     }


        return $next($request);
    }

    protected function guard()
    {
        // dd("TT");
    }

}
