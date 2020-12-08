<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{

    /**
     *  エラー
     */
    public function index()
    {

        return view('errors.404');
    }

    public function payment()
    {

        return view('errors.payment_error');
    }

    public function other(string $mode)
    {

        if($mode == 'payment'){
            return view('errors.payment_error');
        }
        return view('error', ["mode" => $mode]);
    }

}
