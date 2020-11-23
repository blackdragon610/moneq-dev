<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostAdd;
use App\Models\PostAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * プロフィールの登録処理
     * @param  Request  $request
     * @param  Category  $Category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, Category $Category)
    {
        // $this->isPost();

        $member = Auth::user()->pay_status;

        $categories = $Category->getSelectAll();

        return view('posts.input',
            [
                "categories" => $categories,
            ]
        );
    }

    public function store(PostRequest $request, Category $Category, Post $Post, PostTag $PostTag)
    {
        // $this->isPost();

        $datas = $this->checkForm($request);

        $datas["status"] = 2;

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            $categories = $Category->getSelectAll();

            return view('posts.input', [
                "errors" => $datas["errors"],
                "inputs" => $datas["inputs"],
                "categories" => $categories,
                "isConfirmation" => $datas["isConfirmation"],
            ]);
        }else{
            $post = $Post->saveEntry($datas, Auth::user()->id);
            $post_tag = $PostTag->saveEntry($datas['tag'], Auth::user()->id);
        }

        return redirect()->route('post.end', ["postId" => $post->id]);
    }

    public function end(Request $request)
    {
        return view('posts.end',[
            "postId" => $request->input("postId")
            ]
        );
    }

    public function detail(Request $request, Post $Post, PostAdd $PostAdd, PostAnswer $PostAnswer, $postId){
        $post = $Post->find($postId);
        $postAdd = $post->find($postId)->adds;
        $postAnswer = $post->find($postId)->answers;
        $post->user->date_birth = getAge($post->user->date_birth);

        return view('consultdetail.index', compact('post', 'postAdd', 'postAnswer'));
    }

    public function search(Request $request){
        $post = clone $this;
        $post->where(['id', '>', '0'])->paginate(100);
        return view('posts/search', compact('post'));
    }

}
