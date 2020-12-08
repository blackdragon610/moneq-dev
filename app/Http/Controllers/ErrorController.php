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

    public function other(string $mode)
    {

        return view('error', ["mode" => $mode]);
    }

}
