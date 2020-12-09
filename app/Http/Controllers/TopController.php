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
use App\Models\UserPayment;
use App\Models\Expert;
use App\Models\Specialtie;
use App\Models\Notification;
class TopController extends Controller
{

    /**
     * トップ
     */
    public function index(Post $Post, PostAnswer $PostAnswer, PostData $PostData, Expert $Expert, User $User, Specialtie $Specialtie, Notification $Notification, Category $Category, Request $request)
    {

        if(isProfile() == 3){
            if(\Auth::user()->pay_status == 1){
                return redirect()->route('payment', ['sheetId'=>2, 'member'=>1]);
            }
            return redirect()->route('profile.edit');
        }
        // posts
        $accessTopPost = $Post->getAccessTopPosts(10);
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

        $isTop = 1;
        $emailChange = $request->changeEmail;
        $passChange = $request->passChange;

        return view('index', compact('accessTopPost', 'newTopPost', 'monthAnswers', 'totalAnswers', 'monthHelps',
                                     'totalHelps', 'gender', 'prefecture', 'specialties', 'notifications', 'questions',
                                     'answers', 'helps', 'experts', 'users', 'categories', 'isTop', 'emailChange', 'passChange'));
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
        LEFT JOIN(SELECT id, post_name from posts where status=2)t2 on(post_answers.post_id=t2.id))t2
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

            $sql = "SELECT t2.post_name, sub_name, ext_name, t2.body, pId as id, t1.type from(select * from notifications where user_id=".$user_id." and unread = 1 and type=1 )t1
                     LEFT JOIN (SELECT post_name, sub_name, t2.id as pId, ext_name, post_answers.id, body from post_answers
                     LEFT JOIN (SELECT id, concat(expert_name_first,expert_name_second) as ext_name from experts)t1
                        on(post_answers.expert_id=t1.id)
                     LEFT JOIN(SELECT posts.id, post_name, sub_name from posts left join(select id, sub_name from sub_categories)t1 on(posts.sub_category_id=t1.id)
                        where status=2)t2 on(post_answers.post_id=t2.id))t2
                        on(t1.serial=t2.id) ORDER BY t1.created_at desc limit 3";
            $models = \DB::select($sql);
            if(count($models) > 0){
                if($models[0]->id != $maxId)
                {
                    $sendArray = ['count'=>$count, 'notification'=>$models];
                    return response()->json($sendArray);
                }
            }

            return response()->json('0', 200);
        }
    }

    public function repost(Post $Post){
        $Post->rePostCreate();

        return response()->json('ok');
    }

}
