<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpertRequest;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertProfileController extends Controller
{

    /**
     * プロフィールの登録処理
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $inputs = [];

        return view('expert_profiles.input',[
           "inputs" => $inputs
        ]);
    }



    /**
     * プロフィールのアップデート
     * @param  Request  $request
     * @param  User  $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(ExpertRequest $request, Expert $Expert)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('expert_profiles.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();

            $Expert->updateEntry(Auth::guard("expert")->user(), $inputs);


            return redirect()->route('expert.profile.end', ["mode" => "success", "is_pay" => \Session::get("is_pay")]);
        }
    }

    public function end()
    {
        return view('expert_profiles.end',[
                                  ]
        );
    }

}
