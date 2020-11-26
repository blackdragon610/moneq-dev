<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpertRequest;
use App\Models\Expert;
use App\Models\User;
use App\Models\PostAnswer;
use App\Models\PostData;
use App\Models\Category;
use App\Models\SubCategory;
use App\Libs\MailClass;
use App\Mails\ExpertSendMail;

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

    public function detail(PostAnswer $PostAnswer, PostData $PostData, $expertId){
        $expert = Expert::where('id',$expertId)->first();
        $expert->date_birth = getEra($expert->date_birth);

        $gender = configJson('custom/gender');
        $prefecture = configJson('custom/prefecture');

        $expert->gender = $gender[$expert->gender];
        $expert->prefecture_area = $prefecture[$expert->prefecture_area];

        $answers = $PostAnswer->where('expert_id', $expertId)->paginate(10);
        $weekExperts = $PostAnswer->weekHighExpert();
        $monthExperts = $PostAnswer->monthHighExpert();
        $totalExperts = $PostAnswer->totalHighExpert();

        return view('experts.index', compact('expert', 'answers', 'weekExperts', 'monthExperts', 'totalExperts'));
    }

    public function message(Category $Category, $expertId){

        // if (Auth::user()->pay_status == 1){
        //     header("Location:/error/notsee");
        //     exit();
        // }

        $categories = $Category->getSelectAll();
        return view('experts.message', compact('expertId', 'categories'));
    }

    public function send(Expert $Expert, Category $Category, SubCategory $subCategory, Request $request, ExpertSendMail $ExpertSendMail, MailClass $MailClass)
    {
        //エラーチェック
        $validator = Validator::make($request->all(), [
            'surname' => 'required',
            'lastname' => 'required',
            'surnameen' => 'required',
            'lastnameen' => 'required',
            'job' => 'required',
            'description' => 'required',
            'kind' => 'required',
            'hopetime' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        //トークンの保存と送信
        $job = configJson('custom/job');
        $data = $request->all();
        $categories = $subCategory->where('id', $request->kind)->first();
        $data['kind'] = $categories->sub_name;
        $data['job'] = $job[$request->job];
        $ExpertSendMail->datas = $data;
        $expert = $Expert->where('id', $request->expert_id)->first();
        $expertAddress = $expert->email;

        $MailClass->send($ExpertSendMail, $expertAddress);
        return redirect('/');

    }
}
