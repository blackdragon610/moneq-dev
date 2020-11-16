<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
    use Illuminate\Support\Facades\View;


    class IndexController extends AdminController {
    use AuthenticatesUsers;

    public function __construct()
    {

    }


    public function index()
    {



        return view('admins.index');

    }

}

?>
