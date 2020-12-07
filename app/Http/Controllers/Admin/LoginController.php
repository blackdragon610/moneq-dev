<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Controller;
use App\Libs\PushClass;


class LoginController extends AdminController {

    public function __construct()
    {

    }


    public function index()
    {


     return view('admins.login.index');


    }

}

?>
