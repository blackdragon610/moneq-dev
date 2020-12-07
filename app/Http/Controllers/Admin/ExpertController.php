<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserProfileRequest;
use App\Models\Expert;
use Illuminate\Http\Request;

/**
*	専門家管理
*/
class ExpertController extends AdminController
{

    /**
     * コンストラクタ
     */
    public function __construct(){
        parent::__construct();

        $this->model = new Expert();
        $this->setUploadType($this->model);

        \View::Share('layoutListUrl', route('admin.expert.index'));
    }


    /**
     * 一覧の表示
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
		//値の取得
		$lists = $this->model;


		$inputs = $request->input();

		if (!empty($inputs["expert_name"])){
            $lists = $lists->where(\DB::raw("CONCAT(expert_name_second, ' ', expert_name_first)"), "LIKE", "%" . $inputs["expert_name"] . "%");
        }
        if (!empty($inputs["count_answer_from"])){
            $lists = $lists->where("experts.count_answer", ">=", $inputs["count_answer_from"]);
        }
        if (!empty($inputs["count_answer_to"])){
            $lists = $lists->where("experts.count_answer", "<=", $inputs["count_answer_to"]);
        }

        $total = clone $lists;

        $lists = $lists
            ->analytics(["answer", "access", "page_access", "message", "introduction", "introduction_money"])

        ;
        $total = $total->analytics(["answer", "access", "page_access", "message", "introduction", "introduction_money"], true)->first();

        $lists->sort($request->input("sort"), $request->input("sorttype"));

		$lists = $lists->paginate(config('admins.pages')['paginate']);


		return view('admins.experts.index',[
				'lists' => $lists,
                "inputs" => $inputs,
                "total" => $total,
			]
		);
	}


    /**
     * 新規入力画面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
	    //show.
        return view('admins.experts.input',[
            'inputs' => [],
        ]);
    }

    /**
     * 新規登録
     * @param  advertisementRequest  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(UserProfileRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.experts.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();

            $this->model->saveEntryAdmin($inputs);


            return redirect()->route('admin.experts.finished');
        }
    }

    /**
     * 編集入力画面
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id){
        $inputs = $this->model->where(['id' => $id])->first();
        $inputs->setView();

        //show.
        return view('admins.experts.input',[
            'inputs' => $inputs,
            "id" => $id,
        ]);
    }

    /**
     * 更新画面
     * @param int $id
     * @param UserProfileRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(int $id, UserProfileRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.experts.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                "id" => $id,
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();
            $inputs["id"] = $id;


            $this->model->saveEntryAdmin($inputs);

            return redirect()->route('admin.expert.finished');
        }
    }

    /**
     * 完了画面
     */
    public function finished()
    {
        return view('admins.experts.finished',[
        ]);
    }

    /**
     * 削除する
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
      $this->model->find($id)->delete();

      return redirect()->route('admin.expert.index',['reflash' => 'destory']);
    }



}
