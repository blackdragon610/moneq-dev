<?php

namespace App\Http\Controllers;

use App\Libs\ApiClass;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostData;
use App\Models\PostAdd;
use App\Models\PostAnswer;
use App\Models\User;
use App\Models\Expert;
use App\Models\Specialtie;
use App\Models\Notification;
class TopController extends Controller
{

    /**
     * トップ
     */
    public function index(Post $Post, PostAnswer $PostAnswer, PostData $PostData, Expert $Expert, User $User, Specialtie $Specialtie, Notification $Notification, Category $Category)
    {

        // posts
        $accessTopPost = $Post->getAccessTopPosts(10);
        // dd($accessTopPost);
        $newTopPost = $Post->getNewTopPosts(10);

        //experts
        $monthAnswers = $Expert->monthAnswerHighExpert(10);
        $totalAnswers = $Expert->totalAnswerHighExpert(10);
        $monthHelps = $Expert->monthHelpHighExpert(10);
        $totalHelps = $Expert->totalHelpHighExpert(10);


        //notifications
        $notifications = $this->bottomNotification();

        //categories
        $categories = $Category->getSelectAll();

        //counter
        $questions = $Post->getPostCount();
        $answers = $PostAnswer->getAnswerCount();
        $helps = $PostData->getHelpCount();
        $experts = $Expert->getExpertCount();
        $users = $User->getUserCount();

        $gender = configJson('custom/gender');
        $prefecture = configJson('custom/prefecture');
        $specialties = $Specialtie->getSelect();

        return view('index', compact('accessTopPost', 'newTopPost', 'monthAnswers', 'totalAnswers', 'monthHelps',
                                     'totalHelps', 'gender', 'prefecture', 'specialties', 'notifications', 'questions',
                                     'answers', 'helps', 'experts', 'users', 'categories'));
    }

    public function search(Request $request){

    }
    public function searchEngine($keyword){
        $sql = "select keyword from keywords where keyword like '%".$keyword."%' order by keyword";
        $searchs = \DB::select($sql);

        return response()->json(json_encode($searchs));
    }

    public function bottomNotification(){
        $sql = "SELECT t2.post_name, ext_name, t2.body, t2.pId as id, t1.type, DATE_FORMAT(t1.created_at,'%Y年%m月%d日') as created_at from(select * from notifications where unread = 1 and type=1 )t1
        LEFT JOIN (SELECT post_name, t2.id as pId, ext_name, post_answers.id, body from post_answers
        LEFT JOIN (SELECT id, concat(expert_name_first,expert_name_second) as ext_name from experts)t1
           on(post_answers.expert_id=t1.id)
        LEFT JOIN(SELECT id, post_name from posts)t2 on(post_answers.post_id=t2.id))t2
           on(t1.serial=t2.id) ORDER BY t1.created_at desc limit 3";
        $models = \DB::select($sql);

        return $models;
    }

    public function notification(){
        $maxId = 0;
        if(\Cookie::get('custom_token')){
            $user_id = \Auth::user()->id;
            $sendArray = array();
            $sql = "select count(*) as count from notifications where unread = 1 ";
            $count = \DB::select($sql);

            $sql = "SELECT t2.post_name, ext_name, t2.body, pId as id, t1.type from(select * from notifications where user_id=".$user_id." and unread = 1 and type=1 )t1
                     LEFT JOIN (SELECT post_name, t2.id as pId, ext_name, post_answers.id, body from post_answers
                     LEFT JOIN (SELECT id, concat(expert_name_first,expert_name_second) as ext_name from experts)t1
                        on(post_answers.expert_id=t1.id)
                     LEFT JOIN(SELECT id, post_name from posts)t2 on(post_answers.post_id=t2.id))t2
                        on(t1.serial=t2.id) ORDER BY t1.created_at desc limit 3";
            $models = \DB::select($sql);
            if($models[0]->id != $maxId)
            {
                $sendArray = ['count'=>$count, 'notification'=>$models];
                return response()->json($sendArray);
            }

            return response()->json('ok', 200);
        }
    }

    public function route(Request $request, Post $Post, PostAnswer $PostAnswer, PostData $PostData, Notification $notification, $type, $id){
        if($type == 1){
            $post = $Post::where('id',$id)->first();
            $post->post_answer_id = $post->isAnswerCheck();
            $notification->updateReady($post->post_answer_id);
            $Post->updatePostReadCount($post);

            $postAdd = $post->find($id)->adds;
            $postAnswer = $post->find($id)->answers;

            if(isLogin() == 1){
                $isUser = isUser($post->user->id);
            }else $isUser = -1;

            if($isUser == 0){
                $postData = $PostData->getPostHistoryData($post->user->id, $id);
                $postData->user_id =$post->user->id;
                $postData->post_id = $id;
                $postData->type = 1;
                $postData->save();
            }

            $postStoreFlag = $PostData->getPostStoreData($post->user->id, $id);
            $postHelpFlag = $PostData->getPostHelpData($post->user->id, $id);

            $weekExperts = $PostAnswer->weekHighExpert();
            $monthExperts = $PostAnswer->monthHighExpert();
            $totalExperts = $PostAnswer->totalHighExpert();

            $post->user->date_birth = getAge($post->user->date_birth);
            $gender = configJson('custom/gender');
            $post->user->gender = $gender[$post->user->gender];

            return view('consultdetail.index', compact('post', 'postAdd', 'postAnswer', 'weekExperts',
                                                         'monthExperts', 'totalExperts', 'isUser', 'postStoreFlag', 'postHelpFlag'));
            }
    }
}
