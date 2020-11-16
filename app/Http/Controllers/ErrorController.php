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

        return view('error');
    }

    public function other(string $mode)
    {

        return view('error', ["mode" => $mode]);
    }

}
