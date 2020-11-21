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

class EntryController extends Controller
{

    /**
     * 登録の最初の処理
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $mode = $request->input("mode");

        if (!$mode){
            $mode = "email";
        }

        return view('entries.index',
            ["mode" => $mode],
        );
    }

    /**
     * 電話番号 or メールの送信
     * @param  UserLoginRequest  $request
     * @param  UserToken  $UserToken
     * @param  EntryMail  $EntryMail
     * @param  EntryExpertMail  $EntryExpertMail
     * @param  MailClass  $MailClass
     * @param  SmsClass  $SmsClass
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function send(UserLoginRequest $request, UserToken $UserToken, EntryMail $EntryMail, EntryExpertMail $EntryExpertMail, MailClass $MailClass, SmsClass $SmsClass)
    {
        //エラーチェック
        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return view('entries.index', [
                "mode" => $request->input("mode"),
                "errors" => $datas['errors'],
                "inputs" => $datas["inputs"],
            ]);
        }

        //トークンの保存と送信
        $UserToken->setTransaction("トークン登録時にエラー", function() use($UserToken, $request, $datas, $MailClass, $EntryMail, $SmsClass, $EntryExpertMail){
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

                if ($request->input("mode") == "monitor"){
                    $SmsClass->send($datas["inputs"]["tel"], "entry", $EntryMail->datas);
                }
            }

        });

        return redirect()->route('entry.send.end');

    }


    /**
     * 送信完了
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sendEnd()
    {
        return view('entries.send');
    }

    /**
     * パスワード入力画面(通常)
     * @param  Request  $request
     * @param  UserToken  $UserToken
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function password(Request $request, UserToken $UserToken)
    {
        //トークンのチェック
        if (!$UserToken->checkToken($request)){
            return redirect()->route('error');
        }

        return view('entries.password');
    }

    /**
     * パスワード入力処理(通常)
     * @param  PasswordRequest  $request
     * @param  UserToken  $UserToken
     * @param  User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function passwordEnd(PasswordRequest $request, UserToken $UserToken, User $User)
    {
        //トークンのチェック
        if (!$userToken = $UserToken->checkToken($request)){
            return redirect()->route('error');
        }

        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return view('entries.password', [
                "errors" => $datas['errors'],
                "inputs" => $datas["inputs"],
            ]);
        }


        //ユーザー登録
        $User->setTransaction("ユーザー登録時にエラー", function() use($User, $userToken, $datas){
            $user = $User->saveEntry($datas["inputs"], $userToken);

            $user->login($user);

            $user_id = $user->id;
            $email = $user->email;

            $custom_token = Common::tokenSet(0, $user_id, $email);

            Cookie::queue('custom_token', $custom_token, 120);

            $userToken->delete();

        });

        return redirect()->route('profile.edit');
    }

    /**
     * 専門家のパスワード入力
     * @param  Request  $request
     * @param  UserToken  $UserToken
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function expertPassword(Request $request, UserToken $UserToken)
    {
        //トークンのチェック
        if (!$UserToken->checkToken($request)){
            return redirect()->route('error');
        }

        return view('entries.expertPassword');
    }

    /**
     * パスワード入力処理(通常)
     * @param  PasswordRequest  $request
     * @param  UserToken  $UserToken
     * @param  Expert  $Expert
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function expertPasswordEnd(PasswordRequest $request, UserToken $UserToken, Expert $Expert)
    {

        //トークンのチェック
        if (!$userToken = $UserToken->checkToken($request)){
            return redirect()->route('error');
        }

        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return view('entries.expertPassword', [
                "errors" => $datas['errors'],
                "inputs" => $datas["inputs"],
            ]);
        }

        //ユーザー登録
        $Expert->setTransaction("ユーザー登録時にエラー", function() use($Expert, $userToken, $datas){

            $expert = $Expert->saveEntry($datas["inputs"], $userToken);


            $expert->login();
            $userToken->delete();

        });

        return redirect()->route('expert.profile.edit');
    }

}
