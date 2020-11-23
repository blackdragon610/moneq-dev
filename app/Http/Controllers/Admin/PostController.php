<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use Illuminate\Http\Request;

/**
*	管理ユーザー管理
*/
class PostController extends AdminController
{

    /**
     * コンストラクタ
     */
    public function __construct(){
        parent::__construct();

        $this->model = new Post();
        $this->setUploadType($this->model);

        \View::Share('layoutListUrl', route('admin.post.index'));
    }


    /**
     * 一覧の表示
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
		//値の取得
		$lists = $this->model
            ->select(\DB::raw("posts.*"));

        $lists = $lists->leftJoin("users", "users.id", "=", "posts.user_id");

		$inputs = $request->input();

		if (!empty($inputs["nickname"])){
            $lists = $lists->where("nickname", "LIKE", "%" . $inputs["nickname"] . "%");
        }
        if (!empty($inputs["sub_category_id"])){
            $lists = $lists->where("sub_category_id", $inputs["sub_category_id"]);
        }
        if (!empty($inputs["post_name"])){
            $lists = $lists->where("post_name", "LIKE", "%" . $inputs["post_name"] . "%");
        }
        if ((isset($inputs["status"]) && (strlen($inputs["status"])))){
            $lists = $lists->where("status", $inputs["status"]);
        }

        $lists->sort($request->input("sort"), $request->input("sorttype"));
		$lists = $lists->paginate(config('admins.pages')['paginate']);

		return view('admins.posts.index',[
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
        return view('admins.posts.input',[
            'inputs' => [],
        ]);
    }

    /**
     * 新規登録
     * @param  advertisementRequest  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(PostRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.posts.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();

            $this->model->saveEntry($inputs, $inputs["user_id"]);



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

        $PostTag = app("PostTag");

        $inputs["tags"] = $PostTag->getText($id);

        //show.
        return view('admins.posts.input',[
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
    public function update(int $id, PostRequest $request)
    {
        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            //確認画面か入力画面を表示させる
            return view('admins.posts.input',[
                'errors' => $datas['errors'],
                'inputs' => $datas['inputs'],
                "id" => $id,
                'isConfirmation' => $datas['isConfirmation'],
            ]);
        }else{
            //登録完了
            $inputs = $request->input();
            $inputs["id"] = $id;


            $post = $this->model->saveEntry($inputs, $inputs["user_id"]);

            $PostTag = app("PostTag");
            $PostTag->reflash($post->id, $inputs["tags"]);

            return redirect()->route('admin.post.finished');
        }
    }

    /**
     * 完了画面
     */
    public function finished()
    {
        return view('admins.posts.finished',[
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

      return redirect()->route('admin.post.index',['reflash' => 'destory']);
    }


    /**
     * ステータス変更
     * @param  int  $postId
     * @param  Request  $request
     */
    public function status(int $postId, Request $request)
    {
        $model = $this->model->find($postId);
        $model->is_open = $request->input("status");
        $model->save();
    }


}
