<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Route;
use Request;
use Cookie;

class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function common($redirect=true, $type=0){
        parent::common();
    }

    public function search($db){
        return $db;
    }



}
