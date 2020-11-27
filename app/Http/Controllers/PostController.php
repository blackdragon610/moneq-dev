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
use App\Models\Expert;
use App\Mails\AdminSendMail;
use App\Libs\MailClass;

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
    public function create(Request $request, Category $Category, Post $Post)
    {
        // $this->isPost();
        $categories = $Category->getSelectAll();
        $inputs['post_id'] = 0;

        $post = $Post->getRepost();
        if($post){
            $inputs['post_id'] = $post->id;
            $inputs['post_name'] = $post->post_name;
            $inputs['sub_category_id'] = $post->sub_category_id;
            $inputs['body'] = $post->body;

            // dd($post->post_name);
            return view('posts.input',
                [
                    "categories" => $categories,
                    "inputs" => $inputs
                ]
            );
        }

        return view('posts.input',
            [
                "categories" => $categories, 'inputs'=>$inputs
            ]
        );
    }

    public function store(PostRequest $request, Category $Category, Post $Post, PostTag $PostTag)
    {
        // $this->isPost();

        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            $categories = $Category->getSelectAll();

            return view('posts.input', [
                "errors" => $datas["errors"],
                "inputs" => $datas["inputs"],
                "categories" => $categories
            ]);
        }else{
            if($request->post_id == 0){
                $post = $Post->saveEntry($datas['inputs'], Auth::user()->id, 2);
            }else{
                $post = $Post->updateEntry($datas['inputs'], $request->post_id, 2);
            }
            // $PostTag->saveEntry($datas['tag'], Auth::user()->id);
        }

        return redirect()->route('post.end', ["postId" => $post->id]);
    }


    public function preStore(PostRequest $request, Category $Category, Post $Post)
    {
        // dd("234");
        $datas = $this->checkForm($request);

        if (!empty($datas['errors'])){
            $categories = $Category->getSelectAll();

            return response()->json($datas);
        }else{
            if($request->post_id == 0){
                $post = $Post->saveEntry($datas['inputs'], Auth::user()->id, 1);
            }else{
                $post = $Post->updateEntry($datas['inputs'], $request->post_id, 1);
            }
        }

        return response()->json(['ok'=>$post->id]);
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
        $post->post_answer_id = $Post->isAnswerCheck($post);
        $Post->updatePostReadCount($post);

        $postAdd = $post->find($postId)->adds;
        $postAnswer = $post->find($postId)->answers;

        if(isLogin() == 1){
            $isUser = isUser($post->user->id);
        }else $isUser = -1;

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
        $gender = configJson('custom/gender');
        $post->user->gender = $gender[$post->user->gender];

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

    public function postAnswerEntry($answerId, $expertId){
        // dd('werwer');
        $postData = PostData::where([['post_id', $answerId],['user_id', $expertId], ['type', 4]])->first();
        if($postData){
            $expert = Expert::where('id', $expertId)->first();
            $count = $expert->count_useful;
            $count--;
            $expert->count_useful = $count;
            $expert->update();

            $postData->delete();

            return response()->json('0');
        }else{
            $postData = new PostData();
            $postData->user_id = $expertId;
            $postData->post_id = $answerId;
            $postData->type = 4;
            $postData->save();

            $expert = Expert::where('id', $expertId)->first();
            $count = $expert->count_useful;
            $count++;
            $expert->count_useful = $count;
            $expert->update();

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
        $post = Post::where('id', $postId)->first();
        return view('consultdetail.report', compact('post'));
    }

    public function reportEnd(Request $request, AdminSendMail $AdminSendMail, MailClass $MailClass){

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

        $post = Post::where('id', $request->post_id)->first();
        $data['body'] = $request->body;
        $data['post_name'] = $post->post_name;
        // $adminAddress = env('MAIL_USERNAME');

        $datas = array(
            'email' => 'again5651@gmail.com',
            'subject' => 'Testing',
            'data' => $data,
          );

        \Mail::send('messages.emails.expert_send', compact('datas'), function($message) use ($datas){
            $message->to($datas['email']);
            $message->from(config('mail.username'));
            $message->subject($datas['subject']);
        });


        return view('consultdetail.reportend', compact('post'));
    }

    public function reportAdd($postId){
        $post = Post::where('id', $postId)->first();
        return view('consultdetail.reportaddition', compact('post'));
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
        return view('consultdetail.reportadditionend', ['postId'=>$request->post_id]);
    }

}
