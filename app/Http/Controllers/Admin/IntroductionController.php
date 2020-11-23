<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\IntroductionRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\ExpertIntroduction;
use Illuminate\Http\Request;

/**
*	紹介者管理
*/
class IntroductionController extends AdminController
{

    /**
     * コンストラクタ
     */
    public function __construct(){
        parent::__construct();

        $this->model = new ExpertIntroduction();

        \View::Share('layoutListUrl', route('admin.introduction.index'));
    }


    /**
     * 一覧の表示
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
		//値の取得
		$inputs = $request->input();

        $lists = $this->model->leftJoin("experts", "experts.id", "=", "expert_introductions.expert_id");
        $lists = $lists->leftJoin("users", "users.id", "=", "expert_introductions.user_id");

		if (!empty($inputs["expert_name"])){
            $lists = $lists->where(\DB::raw("CONCAT(experts.expert_name_second, '　', experts.expert_name_first)"), "LIKE", "%" . $inputs["expert_name"] . "%");
        }
        if (!empty($inputs["nickname"])){
            $lists = $lists->where("users.nickname", "LIKE", "%" . $inputs["nickname"] . "%");
        }
        if (!empty($inputs["email"])){
            $lists = $lists->where("email", "LIKE", "%" . $inputs["email"] . "%");
        }

        if (!empty($inputs["date_start"])){
            $lists = $lists->where("expert_introductions.created_at", ">=", date("Y-m-d", strtotime($inputs["date_start"])));
        }
        if (!empty($inputs["date_end"])){
            $lists = $lists->where("expert_introductions.created_at", "<=", date("Y-m-d", strtotime($inputs["date_end"])));
        }

        $lists = $lists->select(\DB::raw("expert_introductions.*"));

        //統計
        $count = clone $lists;
        $total["total"] = $count->total()->first();
        $count = clone $lists;
        $total["month"] = $count->total("month")->first();
        $count = clone $lists;
        $total["day"] = $count->total("day")->first();


        $lists->sort($request->input("sort"), $request->input("sorttype"));

		$lists = $lists->paginate(config('admins.pages')['paginate']);

		return view('admins.introductions.index',[
    		    "total" => $total,
				'lists' => $lists,
                "inputs" => $inputs,
			]
		);
	}


    /**
     * 新規入力画面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
	    //show.
        return view('admins.introductions.input',[
            'inputs' => [],
        ]);
    }

    /**
     * 新規登録
     * @param  advertisementRequest  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(IntroductionRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.introductions.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();

            $this->model->saveEntry($inputs);


            return redirect()->route('admin.users.finished');
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
        return view('admins.introductions.input',[
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
    public function update(int $id, IntroductionRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){

            $inputs = $this->model->where(['id' => $id])->first();
            $inputs["money"] = $datas["inputs"]["money"];

            //確認画面か入力画面を表示させる
            return view('admins.introductions.input',[
                'errors' => $datas['errors'],
                'inputs' => $inputs,
                "id" => $id,
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();
            $inputs["id"] = $id;


            $this->model->saveEntry($inputs);

            return redirect()->route('admin.introduction.finished');
        }
    }

    /**
     * 完了画面
     */
    public function finished()
    {
        return view('admins.introductions.finished',[
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

      return redirect()->route('admin.introduction.index',['reflash' => 'destory']);
    }



}
