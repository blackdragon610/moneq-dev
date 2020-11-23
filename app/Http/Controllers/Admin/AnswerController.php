<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\PostAnswer;
use Illuminate\Http\Request;

/**
*	回答の管理
*/
class AnswerController extends AdminController
{

    /**
     * コンストラクタ
     */
    public function __construct(){
        parent::__construct();

        $this->model = new PostAnswer();
        $this->setUploadType($this->model);

        \View::Share('layoutListUrl', route('admin.answer.index'));
    }


    /**
     * 一覧の表示
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){


		if ($request->input("post_id")){
		    \Session::put("postId", $request->input("post_id"));
        }

        $postId = \Session::get("postId");

        //値の取得
        $Post = app("Post");
        $post = $Post->whereId($postId)->first();

        $lists = $this
            ->model
            ->select(\DB::raw("post_answers.*"))
            ->leftJoin("experts", "experts.id", "=", "post_answers.expert_id")
            ->wherePostId($postId);

		$inputs = $request->input();


        $lists->sort($request->input("sort"), $request->input("sorttype"));

		$lists = $lists->paginate(config('admins.pages')['paginate']);

		return view('admins.answers.index',[
				'lists' => $lists,
                "post" => $post,
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
        return view('admins.answers.input',[
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
            return view('admins.answers.input',[
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
        $postId = \Session::get("postId");

        //値の取得
        $Post = app("Post");
        $post = $Post->whereId($postId)->first();

        $inputs = $this->model->where(['id' => $id])->first();
        $inputs->setView();

        //show.
        return view('admins.answers.input',[
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
    public function update(int $id, AnswerRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.answers.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                "id" => $id,
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();
            $inputs["id"] = $id;


            $this->model->saveEntry($inputs);

            return redirect()->route('admin.answer.finished');
        }
    }

    /**
     * 完了画面
     */
    public function finished()
    {
        return view('admins.answers.finished',[
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

      return redirect()->route('admin.answer.index',['reflash' => 'destory']);
    }



}
