<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Libs\MailClass;
use App\Libs\SmsClass;
use App\Mails\ChangeMail;
use App\Mails\PasswordChangeMail;
use App\Models\ChangeToken;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\UserPayment;


class ProfileManageController extends Controller
{
    //
    public function index(){
        $user = Auth::user();

        if($user->is_send_answer == 1){$answer = 'オン';} else{ $answer = 'オフ';}
        if($user->is_send_message == 1){$message = 'オン';} else{ $message = 'オフ';}
        if($user->is_send_master == 1){$master = 'オン';} else{ $master = 'オフ';}

        switch($user->pay_status){
            case 1:
                $pay_status = '無料会員';
                break;
            case 2:
                $pay_status = '年払会員';
                break;
            case 3:
                $pay_status = '月払会員';
                break;
            case 4:
                $pay_status = 'モニター会員';
                break;
        }
        if($user->is_send_answer == 1){$answer = 'オン';} else{ $answer = 'オフ';}
        if($user->is_send_message == 1){$message = 'オン';} else{ $message = 'オフ';}
        if($user->is_send_master == 1){$master = 'オン';} else{ $master = 'オフ';}

        $genderArray = configJson("custom/gender");
        $paymentArray = configJson("custom/payment");
        $email = array($user->email=> '');
        $password = array('**************' => '');
        $profile = array('ニックネーム' => $user->nickname, '性別' => $genderArray[$user->gender]);
        $notification = array('回答通知' => $answer , 'メッセージ通知' => $message, 'MoneQからの通知' => $master);
        $membership = array($pay_status => '');
        if($user->pay_status == 1){
            $payment = "";
        }else{
            $pay = \Cookie::get('paytype');
            $payment = array($paymentArray[$pay] => '');
        }

        return view('profiles.edit.index', compact('email', 'password', 'profile', 'notification', 'membership', 'payment'));
    }

    public function emailUpdate(ChangeToken $ChangeToken, UserLoginRequest $request, MailClass $MailClass, ChangeMail $ChangeMail){

        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return view('profiles.edit.email', [
                "errors" => $datas['errors'],
                "inputs" => $datas["inputs"],
            ]);
        }


        $ChangeToken->setTransaction("トークン登録時にエラー", function() use($ChangeToken, $datas, $MailClass, $ChangeMail){
            $changeToken = $ChangeToken->saveEmailToken($datas["inputs"]);
            // $EntryExpertMail->datas = $ChangeMail->datas = $datas["inputs"];
            // $EntryExpertMail->datas["token"] = $ChangeMail->datas["token"] = $changeToken->token;

            $MailClass->send($ChangeMail, $datas["inputs"]["email"]);

        });

        return redirect()->route('profiles.manage');
    }

    public function emailChange(Request $request, ChangeToken $ChangeToken, User $user)
    {
        //トークンのチェック
        if (!$changeToken = $ChangeToken->checkToken($request, 1)){
            return redirect()->route('error');
        }

        $user = $user->saveEmail($changeToken);
        if($user){
            $changeToken->delete();
            return redirect('/');
        }else{
            return redirect()->route('error');
        }
    }

    public function passwordUpdate(ChangeToken $ChangeToken, PasswordRequest $request, MailClass $MailClass, PasswordChangeMail $passwordMail){
        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return view('profiles.edit.password', [
                "errors" => $datas['errors'],
                "inputs" => $datas["inputs"],
            ]);
        }

        $ChangeToken->setTransaction("トークン登録時にエラー", function() use($ChangeToken, $datas, $MailClass, $passwordMail){
            $changeToken = $ChangeToken->savePasswordToken($datas["inputs"]);
            // $EntryExpertMail->datas = $EntryMail->datas = $datas["inputs"];
            // $EntryExpertMail->datas["token"] = $EntryMail->datas["token"] = $changeToken->token;

            $user = \Auth::user();
            $MailClass->send($passwordMail, $user->email);

        });

        return redirect()->route('profiles.manage');
    }

    public function passwordChange(Request $request, ChangeToken $ChangeToken, User $user)
    {
        //トークンのチェック
        if (!$changeToken = $ChangeToken->checkToken($request, 2)){
            return redirect()->route('error');
        }

        $user = $user->savePassword($changeToken);
        if($user){
            $changeToken->delete();
            return redirect('/');
        }else{
            return redirect()->route('error');
        }
    }

    public function profileEdit(User $user){

        $user = Auth::user();

        $birthDay = new \DateTime($user->date_birth);

        $inputs = ['nickname'=>$user->nickname, 'gender'=>$user->gender, 'date_birth_year'=>$birthDay->format('Y'),
                   'date_birth_month'=>$birthDay->format('m'), 'date_birth_day'=>$birthDay->format('d'),
                   'prefecture'=>$user->prefecture, 'job'=>$user->job, 'marriage'=>$user->marriage, 'child'=>$user->child,
                   'trouble'=>$user->trouble, 'income'=>$user->income, 'family'=>$user->family, 'live'=>$user->live];


        return view('profiles.edit.profile', [
            "inputs" => $inputs,
         ]);
    }

    public function profileUpdate(Request $request, User $User){

        // $datas = $this->checkForm($request);

        // if (!empty($datas['errors'])){
        //     return view('profiles.edit.profile', [
        //         "errors" => $datas['errors'],
        //         "inputs" => $datas["inputs"],
        //     ]);
        // }

        $validator = Validator::make($request->all(), [
            'nickname' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            // return view('profiles.edit.profile', [
            //     "errors" => $validator->errors(),
            //     "inputs" => $request->input(),
            // ]);
            return redirect()->route('profiles.profile.update')->withErrors($validator)->withInput();
        }

        foreach ($request->input() as $key => $value){
            $datas[$key] = $value;
        }

        $user = $User->find(Auth::user()->id);
        $user->setModel($datas);
        $user->changeJsonAll();
        $user->date_birth = $datas["date_birth_year"] . "-" . sprintf("%02d", $datas["date_birth_month"]) . "-" . sprintf("%02d", $datas["date_birth_day"]);

        $user->save();

        return redirect()->route('profiles.manage');
    }

    public function notification(){
        $user = \Auth::user();
        $inputs = [];

        return view('profiles.edit.notification', compact('user'));
    }

    public function notificationUpdate(Request $request, User $User){

        $user = $User->find(Auth::user()->id);
        $user->is_send_answer = $request->is_send_answer == 'on'? 1 : 0;
        $user->is_send_message = $request->is_send_message == 'on'? 1 : 0;
        $user->is_send_master = $request->is_send_master == 'on'? 1 : 0;

        $user->update();

        return redirect()->route('profiles.manage');
    }

    public function membership(){
        $user = \Auth::user();

        return view('profiles.edit.membership', compact('user'));
    }

    public function memberPayment(Request $request){

        return view('profiles.edit.payment');
    }

    public function memberPayDelete(Request $request){

        $user_id = \Auth::user()->id;
        $userModel = User::where('id', $user_id)->first();
        $userModel->pay_status = 1;
        $userModel->save();

        $PayModel = UserPayment::where('user_id', $user_id);
        $PayModel->delete();
        return redirect()->route('profiles.manage');
    }

    public function paymentInfo(Request $request){

        return view('profiles.edit.payment');
    }

    public function paymentInfoUpdate(Request $request, $type){
        \Cookie::queue('paytype', $type);

        return redirect()->route('profiles.manage');
    }
}
