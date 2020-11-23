<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

/**
*	管理ユーザー管理
*/
class UserController extends AdminController
{

    /**
     * コンストラクタ
     */
    public function __construct(){
        parent::__construct();

        $this->model = new User();
        $this->setUploadType($this->model);

        \View::Share('layoutListUrl', route('admin.user.index'));
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

		if (!empty($inputs["nickname"])){
            $lists = $lists->where("nickname", "LIKE", "%" . $inputs["nickname"] . "%");
        }
        if (!empty($inputs["pay_status"])){
            $lists = $lists->where("pay_status", $inputs["pay_status"]);
        }
        if (!empty($inputs["email"])){
            $lists = $lists->where("email", "LIKE", "%" . $inputs["email"] . "%");
        }

        $lists->sort($request->input("sort"), $request->input("sorttype"));

		$lists = $lists->paginate(config('admins.pages')['paginate']);

		return view('admins.users.index',[
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
        return view('admins.users.input',[
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
            return view('admins.users.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();

            $this->model->saveEntryAdmin($inputs);


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
        return view('admins.users.input',[
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
            return view('admins.users.input',[
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

            return redirect()->route('admin.user.finished');
        }
    }

    /**
     * 完了画面
     */
    public function finished()
    {
        return view('admins.users.finished',[
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

      return redirect()->route('admin.user.index',['reflash' => 'destory']);
    }



}
