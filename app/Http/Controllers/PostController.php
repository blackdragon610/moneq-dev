<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostData;
use App\Models\PostAdd;
use App\Models\PostAnswer;
use App\Models\PostReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function detail(Request $request, Post $Post, PostAnswer $PostAnswer, PostData $PostData, $postId){


        $post = $Post->find($postId);
        $postAdd = $post->find($postId)->adds;
        $postAnswer = $post->find($postId)->answers;

        $isUser = isUser($post->user->id);

        if($isUser == 0){
            $postData = $PostData->getPostHistoryData($post->user->id, $postId);
            $postData->user_id =$post->user->id;
            $postData->post_id = $postId;
            $postData->type = 1;
            $postData->save();
        }

        $postStoreFlag = $PostData->getPostStoreData($post->user->id, $postId);
        $postHelpFlag = $PostData->getPostHelpData($post->user->id, $postId);

        $weekExperts = $PostAnswer->weekHighExpert();
        $monthExperts = $PostAnswer->monthHighExpert();
        $totalExperts = $PostAnswer->totalHighExpert();

        $post->user->date_birth = getAge($post->user->date_birth);

        return view('consultdetail.index', compact('post', 'postAdd', 'postAnswer', 'weekExperts',
                                                     'monthExperts', 'totalExperts', 'isUser', 'postStoreFlag', 'postHelpFlag'));
    }

    public function postDataEntry($postId, $value){
        // dd('werwer');
        $postData = PostData::where([['post_id', $postId],['user_id', Auth::user()->id], ['type', $value]])->first();
        if($postData){
            $postData->delete();
            return response()->json('0');
        }else{
            $postData = new PostData();
            $postData->user_id =Auth::user()->id;
            $postData->post_id = $postId;
            $postData->type = $value;
            $postData->save();
            return response()->json('1');
        }
    }

    public function postAnswerCheck($postId, $answerId){
        $post = Post::where([['id', $postId]])->first();
        if($post){
            $post->post_answer_id = $answerId;
            $post->save();
            return response()->json('1');
        }else{
            return response()->json('0');
        }
    }

    public function search(Request $request){
        $post = clone $this;
        $post->where(['id', '>', '0'])->paginate(100);
        return view('posts/search', compact('post'));
    }

    public function report($postId){
        return view('consultdetail.report', compact('postId'));
    }

    public function reportEnd(Request $request){

        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $postReport = new PostReport();
        $postReport->post_id = $request->post_id;
        $postReport->user_id = Auth::user()->id;
        $postReport->body = $request->body;
        $postReport->save();
        return view('consultdetail.reportend');
    }

    public function reportAdd($postId){
        return view('consultdetail.reportaddition', compact('postId'));
    }

    public function reportAddEnd(Request $request){

        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $postReport = new PostAdd();
        $postReport->post_id = $request->post_id;
        $postReport->user_id = Auth::user()->id;
        $postReport->body = $request->body;
        $postReport->save();
        return view('consultdetail.reportadditionend');
    }

}
