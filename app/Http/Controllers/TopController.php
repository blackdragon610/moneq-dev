<?php

namespace App\Http\Controllers;

use App\Libs\ApiClass;
use Illuminate\Http\Request;

class TopController extends Controller
{

    /**
     * トップ
     */
    public function index()
    {

        return view('index');
    }

}
