<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Libs\MailClass;
use App\Libs\SmsClass;
use App\Mails\EntryExpertMail;
use App\Mails\EntryMail;
use App\Models\Expert;
use App\Models\UserToken;

use Illuminate\Support\Facades\Auth;

class ProfileManageController extends Controller
{
    //
    public function index(){
        $user = \Auth::user();

        return view('profiles.edit.index', compact('user'));
    }

    public function emailUpdate(UserToken $UserToken, Request $request, MailClass $MailClass, EntryMail $EntryMail, EntryExpertMail $EntryExpertMail){

        $datas = Validator::make($request->all(), [
            'email' => 'required | distinct'
        ]);

        if ($datas->fails()) {
            return back()->withErrors($datas)->withInput();
        }


        $UserToken->setTransaction("トークン登録時にエラー", function() use($UserToken, $request, $datas, $MailClass, $EntryMail, $EntryExpertMail){
            $userToken = $UserToken->saveEntry($request->input("mode"), $datas["inputs"], intval($request->get("expert")));
            $EntryExpertMail->datas = $EntryMail->datas = $datas["inputs"];
            $EntryExpertMail->datas["token"] = $EntryMail->datas["token"] = $userToken->token;

            if ($request->get("expert")){
                //専門家
                $MailClass->send($EntryExpertMail, $datas["inputs"]["email"]);
            }else{
                //通常
                if ($request->input("mode") == "email"){
                    $MailClass->send($EntryMail, $datas["inputs"]["email"]);
                }
            }

        });
    }

    public function passwordUpdate(Request $request){

    }

    public function profileEdit(User $user){

        $user = \Auth::user();

        return view('profiles.edit.profile', compact('user'));
    }

    public function profileUpdate(Request $request){

    }

    public function notification(){
        $user = \Auth::user();

        return view('profiles.edit.notification', compact('user'));
    }

    public function notificationUpdate(){

    }

    public function membership(){
        $user = \Auth::user();

        return view('profiles.edit.memvership', compact('user'));
    }

    public function memberPayment(Request $request){

    }

    public function memberPayDelete(Request $request){

    }
}
