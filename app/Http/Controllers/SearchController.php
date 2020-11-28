<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserLoginRequest;
use App\Libs\MailClass;
use App\Libs\SmsClass;
use App\Mails\EntryExpertMail;
use App\Mails\EntryMail;
use App\Models\Expert;
use App\Models\User;
use App\Models\UserToken;
use Illuminate\Http\Request;

use App\Libs\Common;
use Cookie;

class SearchController extends Controller
{

    /**
     * 登録の最初の処理
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

    }

}
