<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    /**
     * プロフィールの登録処理
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {

        return view('profiles.input',
        );
    }

    /**
     * プロフィールの基本部分の完了処理
     * @param Request $request
     * @param User $User
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $User)
    {
        $validator = Validator::make($request->all(), [
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }
        $User->setSession($request->input());

        return redirect()->route('profile.plus');
    }

    /**
     * プロフィールの任意入力処理
     * @param Request $request
     * @param User $User
     * @return \Illuminate\Http\RedirectResponse
     */
    public function plus(Request $request, User $User)
    {
        $inputs = [];

        return view('profiles.inputPlus',[
            "inputs" => $inputs,
            ]
        );
    }

    /**
     * プロフィールのアップデート
     * @param  Request  $request
     * @param  User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updatePlus(Request $request, User $User)
    {
        $datas = $User->getSession();

        foreach ($request->input() as $key => $value){
            $datas[$key] = $value;
        }

        $user = $User->find(Auth::user()->id);
        $user->setModel($datas);
        $user->changeJsonAll();
        $user->date_birth = $datas["date_birth_year"] . "-" . sprintf("%02d", $datas["date_birth_month"]) . "-" . sprintf("%02d", $datas["date_birth_day"]);

        $user->update();

        return redirect()->route('profile.end');
    }

    public function end()
    {
        return view('profiles.end',[
                                  ]
        );
    }

}
