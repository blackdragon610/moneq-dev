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
        // $Post->rePostCreate();
        if(isProfile() == 3){
            if(\Auth::user()->pay_status == 1){
                return redirect()->route('payment', ['sheetId'=>2, 'member'=>1]);
            }
            return redirect()->route('profile.edit');
        }

        $possibleCount = \Auth::user()->isPost();

        if($possibleCount + \Auth::user()->re_point == 0){
            header("Location:/error/notsee");
            exit();
        }

        $categories = $Category->getSelectAll();
        $inputs['post_id'] = 0;
        $isConfirmation = false;


        $post = $Post->getRepost();
        if($post){
            $inputs['post_id'] = $post->id;
            $inputs['post_name'] = $post->post_name;
            $inputs['sub_category_id'] = $post->sub_category_id;
            $inputs['body'] = $post->body;

            return view('posts.input',
                [
                    "categories" => $categories,
                    "inputs" => $inputs,
                    "possibleCount" => $possibleCount,
                    "isConfirmation" => $isConfirmation,
                ]
            );
        }


        return view('posts.input',
            [
                "categories" => $categories, 'inputs'=>$inputs, 'possibleCount'=>$possibleCount, 'isConfirmation' => $isConfirmation
            ]
        );
    }

    public function store(PostRequest $request, Category $Category, Post $Post, PostTag $PostTag)
    {
        $possibleCount = \Auth::user()->isPost();

        if($possibleCount + \Auth::user()->re_point == 0){
            header("Location:/error/notsee");
            exit();
        }

        $datas = $this->checkForm($request);

        if ((!$request->input('end')) || (!empty($datas['errors']))){
            $categories = $Category->getSelectAll();

            if(\Auth::user()->pay_status == 2){
                $possibleCount = 3 - \Auth::user()->postCount();
            }else{
                $possibleCount = 1;
            }

            return view('posts.input', [
                "errors" => $datas["errors"],
                "inputs" => $datas["inputs"],
                "possibleCount" => $possibleCount,
                "categories" => $categories,
                "isConfirmation" => $datas["isConfirmation"],
            ]);

        }else{
            // dd($datas);
            if($request->post_id == 0){
                $post = $Post->saveEntry($datas, Auth::user()->id, 2);
            }else{
                $post = $Post->updateEntry($datas, $request->post_id, 2);
            }

            \Session::pull('inputs');


            $count = Auth::user()->re_point;
            $count--;
            if($count >= 0){
                Auth::user()->re_point = $count;
                \Auth::user()->save();
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


        $post = $Post->whereId($postId)->whereStatus(2)->withTrashed()->first();
        if(!$post){
            header("Location:/error");
            exit();
        }

        $Post->updatePostReadCount($post);

        $postAdd = $post->adds;
        $postAnswer = $post->answers;
        $relationPosts = $post->getPostByCategory();

        $postStoreFlag = 0;
        $postHelpFlag = 0;

        if(isLogin() == 1){
            $isUser = isUser($post->user->id);
            $PostData->user_id = \Auth::user()->id;
            $PostData->post_id = $postId;
            $PostData->type = 1;
            $PostData->save();
            $postStoreFlag = $PostData->getPostStoreData(\Auth::user()->id, $postId);
            $postHelpFlag = $PostData->getPostHelpData(\Auth::user()->id, $postId);
            }else   $isUser = -1;


        $weekExperts = $PostAnswer->weekHighExpert();
        $monthExperts = $PostAnswer->monthHighExpert();
        $totalExperts = $PostAnswer->totalHighExpert();

        $gender = configJson('custom/gender');
        $post->user->gender = $gender[$post->user->gender];
        $prefecture = configJson('custom/prefecture');

        return view('consultdetail.index', compact('post', 'postAdd', 'postAnswer', 'weekExperts', 'relationPosts',
                                                     'monthExperts', 'totalExperts', 'isUser', 'postStoreFlag', 'postHelpFlag', 'gender'));
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

    public function report(PostAnswer $PostAnswer, $postId){

        $weekExperts = $PostAnswer->weekHighExpert();
        $monthExperts = $PostAnswer->monthHighExpert();
        $totalExperts = $PostAnswer->totalHighExpert();

        $post = Post::where('id', $postId)->first();
        return view('consultdetail.report', compact('post', 'weekExperts', 'monthExperts', 'totalExperts'));
    }

    public function reportEnd(Request $request, AdminSendMail $AdminSendMail, MailClass $MailClass){

        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if($validator->fails()){
            $post = Post::where('id', $request->post_id)->first();
            $inputs = $request->input();
            $errors = $validator->errors();

            return view('consultdetail.report', compact('post', 'inputs', 'errors'));
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
            'email' => env('ADMIN_MAIL_USERNAME'),
            'subject' => '通報がありました',
            'data' => $data,
          );

        \Mail::send('messages.emails.admin', compact('datas'), function($message) use ($datas){
            $message->to($datas['email']);
            $message->from(config('mail.username'));
            $message->subject($datas['subject']);
        });


        return view('consultdetail.reportend', compact('post'));
    }

    public function reportAdd($postId){

        if(isLogin() == -1){
            header("Location:/error/notsee");
            exit();
        }else{
            $post = Post::where('id', $postId)->first();

            if($post->user_id != Auth::user()->id){
                header("Location:/error/notsee");
                exit();
            }
            return view('consultdetail.reportaddition', compact('post'));
        }

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
