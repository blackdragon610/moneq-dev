<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Specialtie;
use App\Models\Expert;
use App\Models\Keyword;

use App\Libs\Common;
use Cookie;

class SearchController extends Controller
{

    /**
     * 登録の最初の処理
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Category $Category, Request $request, Keyword $Keyword)
    {

        $categories = $Category->getSelectAll();
        $keyword = $request->searchTxt;
        if($keyword)
            $Keyword->saveKeyword($keyword);
        return view('searches.category.categories', compact('keyword', 'categories'));
    }

    public function searchTema(Request $request, Post $Post, Specialtie $Specialtie){

        $keyword = $request->keyword;

        $gender = configJson('custom/gender');
        $spec = $Specialtie->getSearchSelect();

        if ($request->ajax()) {
            $keyword = $request->keyword;
            $filter = $request->filter;
            $order = $request->order;

            $orderStr = '';

            if($order == 1) $orderStr = " count_usuful desc ";
            if($order == 2) $orderStr = " count_access desc ";

            $where = '1';
            if($keyword != ''){
                $where .= " and (post_name like '%".$keyword."%' or body like '%".$keyword."%')";
            }

            if($filter != ''){
                $total = array();
                $total = explode(',', $filter);
                $q1 = array(); $q2 = array(); $q3 = array(); $q4 = array(); $q5 = array(); $q6 = array();
                foreach($total as $item){
                    $temp = array();
                    $temp = explode('-', $item);
                    switch($temp[0]){
                        case 1:
                            array_push($q1, $temp[1]);
                            break;
                        case 2:
                            array_push($q2, $temp[1]);
                            break;
                        case 3:
                            array_push($q3, $temp[1]);
                            break;
                        case 4:
                            array_push($q4, $temp[1]);
                            break;
                        case 5:
                            array_push($q5, $temp[1]);
                            break;
                        case 6:
                            array_push($q6, $temp[1]);
                            break;

                    }
                }

                $sql1 = '';
                foreach($q1 as $key=>$val){
                    if($key != 0)   $sql1 .= ' or ';
                        switch($val){
                            case 1:
                                $sql1 .= 'post_answer_id <> 0';
                            break;
                            case 2:
                                $sql1 .= 'post_answer_id = 0';
                            break;
                            case 3:
                                $sql1 .= 'count_answer = 0';
                            break;
                        }
                }

                $sql2 = '';
                foreach($q2 as $key=>$val){
                    if($key != 0)   $sql2 .= ' or ';
                        switch($val){
                            case 1:
                                $sql2 .= 'gender = 1';
                            break;
                            case 2:
                                $sql2 .= 'gender = 2';
                            break;
                            case 3:
                                $sql2 .= 'gender = 3';
                            break;
                        }
                }

                $sql3 = '';
                foreach($q3 as $key=>$val){
                    if($key != 0)   $sql3 .= ' or ';
                        switch($val){
                            case 1:
                                $sql3 .= 'era = 0';
                            break;
                            case 2:
                                $sql3 .= 'era < 10';
                            break;
                            case 3:
                                $sql3 .= '(era > 9 and era < 20)';
                            break;
                            case 4:
                                $sql3 .= '(era > 19 and era < 30)';
                            break;
                            case 5:
                                $sql3 .= '(era > 29 and era < 40)';
                            break;
                            case 6:
                                $sql3 .= '(era > 39 and era < 50)';
                            break;
                            case 7:
                                $sql3 .= '(era > 49 and era < 60)';
                            break;
                            case 8:
                                $sql3 .= '(era > 59 and era < 70)';
                            break;
                            case 9:
                                $sql3 .= '(era > 69)';
                            break;
                        }
                }

                $sql4 = '';
                foreach($q4 as $key=>$val){
                    if($key != 0)   $sql4 .= ' or ';
                        switch($val){
                            case 1:
                                $sql4 .= 'marriage = 1';
                            break;
                            case 2:
                                $sql4 .= 'marriage = 2';
                            break;
                            case 3:
                                $sql4 .= 'child > 0';
                            break;
                            case 3:
                                $sql4 .= 'child = 0 or isnull(child)';
                            break;
                        }
                }

                $sql5 = '';
                foreach($q5 as $key=>$val){
                    if($key != 0)   $sql5 .= ' or ';
                    $sql5 .= 'specialtie_id = '.$val;
                }

                $sql6 = '';
                foreach($q6 as $key=>$val){
                    if($key != 0)   $sql6 .= ' or ';
                    $sql6 .= 'prefecture_area = '.$val;
                }

                if($sql1 != '') $where .= ' and ('.$sql1.')';
                if($sql2 != '') $where .= ' and ('.$sql2.')';
                if($sql3 != '') $where .= ' and ('.$sql3.')';
                if($sql4 != '') $where .= ' and ('.$sql4.')';
                if($sql5 != '') $where .= ' and ('.$sql5.')';
                if($sql6 != '') $where .= ' and ('.$sql6.')';
            }

            $totalSql = "SELECT t1.id, t1.created_at, t1.updated_at, t1.deleted_at, post_name, body, count_answer, count_usuful, count_access, nickname,
                         gender, era, child, marriage, date_birth, sub_name, specialtie_id, prefecture_area, post_answer_id from
                        (SELECT DISTINCT posts.* , specialtie_id, prefecture_area from posts
                         LEFT JOIN(SELECT post_id, specialtie_id, prefecture_area from post_answers
                                   LEFT JOIN (SELECT *from experts)t1 on(post_answers.expert_id=t1.id))t1
                         on(posts.id=t1.post_id) where status=2)t1
                         LEFT JOIN (select id, nickname, gender, floor(datediff(curdate(),date_birth) / 365) as era, child, marriage, date_birth from users)t2
                         on(t1.user_id=t2.id)
                         LEFT JOIN(select sub_name, id from sub_categories)t3 on(t1.sub_category_id=t3.id)";

            if($where != '1')    $totalSql .= " where ".$where;
            if($order != 0 && $order != 3 )    $totalSql .= " order by ".$orderStr.", updated_at desc";
            else    $totalSql .= " order by updated_at desc";

            $posts = \DB::select($totalSql);

            $posts = $this->arrayPaginator($posts, $request);

            $view = view('searches.tema.tema', compact('posts', 'gender', 'keyword'))->render();
            return response()->json(['html'=>$view]);
        }

        $totalSql = "SELECT t1.id, t1.created_at, t1.updated_at, t1.deleted_at, post_name, body, count_answer, count_usuful, count_access, nickname,
                        gender, era, child, marriage, date_birth, sub_name, specialtie_id, post_answer_id from
                        (SELECT DISTINCT posts.* , specialtie_id from posts
                        LEFT JOIN(SELECT post_id, specialtie_id from post_answers
                                    LEFT JOIN (SELECT *from experts)t1 on(post_answers.expert_id=t1.id))t1
                        on(posts.id=t1.post_id) where status=2)t1
                        LEFT JOIN (select id, nickname, gender, floor(datediff(curdate(),date_birth) / 365) as era, child, marriage, date_birth from users)t2
                        on(t1.user_id=t2.id)
                        LEFT JOIN(select sub_name, id from sub_categories)t3 on(t1.sub_category_id=t3.id)
                        where post_name like '%".$keyword."%' or body like '%".$keyword."%' order by updated_at desc";
        $posts = \DB::select($totalSql);

        $posts = $this->arrayPaginator($posts, $request);

       return view('searches.tema.index', compact('keyword', 'posts', 'gender', 'spec'));
    }

    public function searchCategory(Request $request, Post $Post, Specialtie $Specialtie, Category $Category, SubCategory $SubCategory){

        $category = $request->category;
        $keyword = $request->keyword;
        $category_name = $request->category_name;
        $gender = configJson('custom/gender');
        $spec = $Specialtie->getSearchSelect();
        $categories = $Category->getSelectAll();

        if ($request->ajax()) {
            $keyword = $request->keyword;
            $filter = $request->filter;
            $order = $request->order;

            $orderStr = '';

            if($order == 1) $orderStr = " count_usuful desc ";
            if($order == 2) $orderStr = " count_access desc ";

            $where = '1';
            if($keyword != ''){
                $where .= " and (post_name like '%".$keyword."%' or body like '%".$keyword."%')";
            }

            if($filter != ''){
                $total = array();
                $total = explode(',', $filter);
                $q1 = array(); $q2 = array();
                foreach($total as $item){
                    $temp = array();
                    $temp = explode('-', $item);
                    switch($temp[0]){
                        case 3333:
                            array_push($q1, $temp[1]);
                            break;
                        case 5:
                            array_push($q2, $temp[1]);
                            break;
                    }
                }

                $sql1 = '';
                foreach($q1 as $key=>$val){
                    if($key != 0)   $sql1 .= ' or ';
                        $sql1 .= "sub_category_id = ".$val;
                }

                $sql2 = '';
                foreach($q2 as $key=>$val){
                    if($key != 0)   $sql2 .= ' or ';
                        $sql2 .= "specialtie_id = ".$val;
                }

                if($sql1 != '') $where .= ' and ('.$sql1.')';
                if($sql2 != '') $where .= ' and ('.$sql2.')';
            }

            $totalSql = "SELECT t1.id, t1.created_at, t1.updated_at, t1.deleted_at, post_name, body, count_answer, count_usuful, count_access, nickname,
                         gender, era, child, marriage, date_birth, sub_name, specialtie_id, post_answer_id from
                        (SELECT DISTINCT posts.* , specialtie_id from posts
                         LEFT JOIN(SELECT post_id, specialtie_id from post_answers
                                   LEFT JOIN (SELECT *from experts)t1 on(post_answers.expert_id=t1.id))t1
                         on(posts.id=t1.post_id) where status=2)t1
                         LEFT JOIN (select id, nickname, gender, floor(datediff(curdate(),date_birth) / 365) as era, child, marriage, date_birth from users)t2
                         on(t1.user_id=t2.id)
                         LEFT JOIN(select sub_name, id from sub_categories)t3 on(t1.sub_category_id=t3.id)";

            if($where != '1')    $totalSql .= " where ".$where;
            if($order != 0 && $order != 3)    $totalSql .= " order by ".$orderStr.", updated_at desc";
            else    $totalSql .= " order by updated_at desc";

            $posts = \DB::select($totalSql);

            $posts = $this->arrayPaginator($posts, $request);

            $view = view('searches.category.tema', compact('posts', 'gender', 'keyword', 'category_name'))->render();
            return response()->json(['html'=>$view]);
        }

        $totalSql = "SELECT t1.id, t1.created_at, t1.updated_at, t1.deleted_at, post_name, body, count_answer, count_usuful, count_access, nickname,
                        gender, era, child, marriage, date_birth, sub_name, specialtie_id, post_answer_id from
                        (SELECT DISTINCT posts.* , specialtie_id from posts
                        LEFT JOIN(SELECT post_id, specialtie_id from post_answers
                                    LEFT JOIN (SELECT *from experts)t1 on(post_answers.expert_id=t1.id))t1
                        on(posts.id=t1.post_id) where status=2)t1
                        LEFT JOIN (select id, nickname, gender, floor(datediff(curdate(),date_birth) / 365) as era, child, marriage, date_birth from users)t2
                        on(t1.user_id=t2.id)
                        LEFT JOIN(select sub_name, id from sub_categories)t3 on(t1.sub_category_id=t3.id)
                        where (post_name like '%".$keyword."%' or body like '%".$keyword."%')";
        if($category != '')  $totalSql .= " and sub_category_id=".$category;

        $totalSql .= " order by updated_at desc";

        $posts = \DB::select($totalSql);

        $posts = $this->arrayPaginator($posts, $request);

        if($category != '')
            $category_name = $SubCategory->getCategoryName($category);
        else    $category_name = '';

       return view('searches.category.index', compact('keyword', 'posts', 'gender', 'spec', 'categories', 'category', 'category_name'));
    }

    public function searchExpert(Request $request, Specialtie $Specialtie){

        if(isProfile() == 3){
            return redirect()->route('profile.edit');
        }

        $gender = configJson('custom/gender');
        $spec = $Specialtie->getSearchSelect();
        $prefecture = configJson('custom/prefecture');

        if ($request->ajax()) {
            $filter = $request->filter;
            $order = $request->order;

            $orderStr = '';
            if($order == 1) $orderStr = " count_useful desc ";
            if($order == 2) $orderStr = " count_answer desc ";

            $where = '1';

            if($filter != ''){
                $total = array();
                $total = explode(',', $filter);
                $q1 = array(); $q2 = array(); $q3 = array(); $q4 = array(); $q5 = array();
                foreach($total as $item){
                    $temp = array();
                    $temp = explode('-', $item);
                    switch($temp[0]){
                        case 1:
                            array_push($q1, $temp[1]);
                            break;
                        case 2:
                            array_push($q2, $temp[1]);
                            break;
                        case 3:
                            array_push($q3, $temp[1]);
                            break;
                        case 4:
                            array_push($q4, $temp[1]);
                            break;
                        case 5:
                            array_push($q5, $temp[1]);
                            break;
                                }
                }

                $sql1 = '';
                foreach($q1 as $key=>$val){
                    if($key != 0)   $sql1 .= ' or ';
                        $sql1 .= "count_useful > ".$val;
                }

                $sql2 = '';
                foreach($q2 as $key=>$val){
                    if($key != 0)   $sql2 .= ' or ';
                        $sql2 .= "count_answer > ".$val;
                }

                $sql3 = '';
                foreach($q3 as $key=>$val){
                    if($key != 0)   $sql3 .= ' or ';
                        $sql3 .= "prefecture = ".$val;
                }

                $sql4 = '';
                foreach($q4 as $key=>$val){
                    if($key != 0)   $sql4 .= ' or ';
                        $sql4 .= "evaluation > ".$val;
                }

                $sql5 = '';
                foreach($q5 as $key=>$val){
                    if($key != 0)   $sql5 .= ' or ';
                        $sql5 .= "specialtie_id = ".$val;
                }

                if($sql1 != '') $where .= ' and ('.$sql1.')';
                if($sql2 != '') $where .= ' and ('.$sql2.')';
                if($sql3 != '') $where .= ' and ('.$sql3.')';
                if($sql4 != '') $where .= ' and ('.$sql4.')';
                if($sql5 != '') $where .= ' and ('.$sql5.')';
            }

            if($order != 0 && $order != 3)    $orderStr = $orderStr.", updated_at desc";
            else    $orderStr .= "updated_at desc";

            $experts = Expert::whereRaw($where)->orderByRaw($orderStr)->paginate(config('app.per_page'));

            $view = view('searches.expert.tema', compact('experts', 'gender', 'prefecture'))->render();
            return response()->json(['html'=>$view]);
        }

        $experts = Expert::orderBy('updated_at', 'desc')->withTrashed()->paginate(config('app.per_page'));

       return view('searches.expert.index', compact('experts', 'gender', 'spec', 'prefecture'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->page ?:1;
        $perPage = config('app.per_page');
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }

}
