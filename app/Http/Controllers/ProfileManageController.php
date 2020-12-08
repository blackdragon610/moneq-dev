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
use App\Models\UserToken;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\UserPayment;


class ProfileManageController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();

        if($user->pay_status)
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
        $email = array('メールアドレス'=> $user->email);
        $password = array('パスワード' => '**************');
        $profile = array('ニックネーム' => $user->nickname, '性別' => $user->gender?$genderArray[$user->gender]:'');
        $notification = array('回答通知' => $answer , 'メッセージ通知' => $message, 'MoneQからの通知' => $master);
        $membership = array($pay_status => '');

        $payment = "";
        if($user->pay_status != 1){
            $pay = \Cookie::get('paytype');
            if(isset($pay))
                $payment = array($paymentArray[$pay] => '');
        }

        $emailChange = $request->emailChange;
        $passChange = $request->passChange;
        $profileChange = $request->profileChange;
        $notifyChange = $request->notifyChange;

        return view('profiles.edit.index', compact('email', 'password', 'profile', 'notification',
                                                    'membership', 'payment', 'emailChange', 'passChange',
                                                    'profileChange', 'notifyChange'));
    }

    public function emailUpdate(ChangeToken $ChangeToken, UserLoginRequest $request, MailClass $MailClass, ChangeMail $ChangeMail){


        $emailChange = 0;
        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            return response()->json(array(
                'success' => false,
                'errors' => $datas['errors']

            ), 400);
        }


        $ChangeToken->setTransaction("トークン登録時にエラー", function() use($ChangeToken, $request, $datas, $MailClass, $ChangeMail){
            $changeToken = $ChangeToken->saveEmailToken($datas["inputs"]);
            $item["token"] = $changeToken->token;
            $item['domain'] = getMyURL();

            $data = array(
                'email' => $datas['inputs']['email'],
                'subject' => 'メールアドレスの変更',
                'item' => $item,
              );

            \Mail::send('messages.emails.change_email', compact('data'), function($message) use ($data){
                $message->to($data['email']);
                $message->from(config('mail.username'));
                $message->subject($data['subject']);

            });

            if (\Mail::failures()) {
                return response()->json('no');
            }else
                return response()->json('ok');
        });

        return response()->json('ok');
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
            return redirect()->route('top', ['emailChange'=>1]);
        }else{
            return redirect()->route('error');
        }
    }

    public function passwordUpdate(ChangeToken $ChangeToken, PasswordRequest $request, MailClass $MailClass, PasswordChangeMail $passwordMail){

        $passChange = 0;
        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){

            return response()->json(array(
                'success' => false,
                'errors' => $datas['errors']

            ), 400);
        }

        $ChangeToken->setTransaction("トークン登録時にエラー", function() use($ChangeToken, $request, $datas, $MailClass, $passwordMail){
            $changeToken = $ChangeToken->savePasswordToken($datas["inputs"]);
            $item["token"] = $changeToken->token;
            $item['domain'] = getMyURL();

            $data = array(
                'email' => \Auth::user()->email,
                'subject' => 'パスワードの変更',
                'item' => $item,
              );

            \Mail::send('messages.emails.change_password', compact('data'), function($message) use ($data){
                $message->to($data['email']);
                $message->from(config('mail.username'));
                $message->subject($data['subject']);

            });

            if (\Mail::failures()) {
                return response()->json('no');
            }else
                return response()->json('ok');

        });

        return response()->json('ok');

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
            return redirect()->route('top', ['passChange'=>1]);
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

        $validator = Validator::make($request->all(), [
            'nickname' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->errors()

            ), 400);
        }

        foreach ($request->input() as $key => $value){
            $datas[$key] = $value;
        }

        $user = $User->find(Auth::user()->id);
        $user->setModel($datas);
        $user->changeJsonAll();
        $user->date_birth = $datas["date_birth_year"] . "-" . sprintf("%02d", $datas["date_birth_month"]) . "-" . sprintf("%02d", $datas["date_birth_day"]);

        if($user->save())
            return response()->json('ok');
        else
            return response()->json('no');

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

        if($user->update())
            return response()->json('ok');
        else
            return response()->json('no');

    }

    public function membership(){
        $user = \Auth::user();

        return view('profiles.edit.membership', compact('user'));
    }

    public function memberPayment(Request $request){

        $possibleCount = 0;
        if(\Auth::user()->pay_status == 2){
            $possibleCount = 3 - \Auth::user()->postCount();
        }else if(\Auth::user()->pay_status == 3){
            $possibleCount = 1 - \Auth::user()->postCount();
        }
        $count = \Auth::user()->re_point;
        \Auth::user()->re_point = $possibleCount + $count;
        \Auth::user()->save();

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
