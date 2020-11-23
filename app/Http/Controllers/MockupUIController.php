<?php

namespace App\Http\Controllers;

use App\Libs\ApiClass;
use App\Libs\PushClass;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class MockupUIController extends Controller
{

    /**
     * For test UI mockup views
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        return view($name);
    }

}
