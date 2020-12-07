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
use Illuminate\Support\Facades\DB;

class OtherController extends Controller
{

    public function selfPostData(Post $Post, Request $request)
    {

        if(isProfile() == 3){
            if(\Auth::user()->pay_status == 1){
                return redirect()->route('payment', ['sheetId'=>2, 'member'=>1]);
            }
            return redirect()->route('profile.edit');
        }

        // posts
        $posts = $Post->where('user_id', \Auth::user()->id)
                                ->orderBy('created_at', 'desc')
                                ->withTrashed()
                                ->paginate(config('app.per_page'));
        $gender = configJson('custom/gender');

        $view = '';
        if ($request->ajax()) {
            foreach($posts as $post){
                $contents = $post;

                $view .= view('layouts.parts.custom.article', compact('contents', 'gender'))->render();
            }
            return response()->json(['html'=>$view]);
        }

        return view('others.self', compact('posts', 'gender'));
    }

    public function accessPostData(PostData $PostData, Request $request)
    {

        if(isProfile() == 3){
            return redirect()->route('profile.edit');
        }

        // posts
        $posts = $PostData->leftJoin('posts', 'posts.id', '=', 'post_data.post_id')
                            ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
                            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
                            ->select(DB::raw('posts.*, sub_name, nickname, date_birth, gender, posts.id as pId'))
                            ->where('post_data.type', 1)
                            ->where('post_data.user_id', \Auth::user()->id)
                            ->whereRaw('!isnull(posts.id)')
                            ->orderBy('post_data.updated_at', 'desc')
                            ->withTrashed()
                            ->paginate(config('app.per_page'));
        $gender = configJson('custom/gender');

        $view = '';
        if ($request->ajax()) {
            foreach($posts as $post){
                $contents = $post;

                $view .= view('layouts.parts.custom.otherarticle', compact('contents', 'gender'))->render();
            }
            return response()->json(['html'=>$view]);
        }

        return view('others.access', compact('posts', 'gender'));
    }

    public function storePostData(PostData $PostData, Request $request)
    {

        if(isProfile() == 3){
            if(\Auth::user()->pay_status == 1){
                return redirect()->route('payment', ['sheetId'=>2, 'member'=>1]);
            }
            return redirect()->route('profile.edit');
        }

        // posts
        $posts = $PostData->leftJoin('posts', 'posts.id', '=', 'post_data.post_id')
                            ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
                            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
                            ->select(DB::raw('posts.*, sub_name, nickname, date_birth, gender, posts.id as pId'))
                            ->where('post_data.type', 2)
                            ->where('post_data.user_id', \Auth::user()->id)
                            ->whereRaw('!isnull(posts.id)')
                            ->orderBy('post_data.created_at', 'desc')
                            ->withTrashed()
                            ->paginate(config('app.per_page'));
        $gender = configJson('custom/gender');

        $view = '';
        if ($request->ajax()) {
            foreach($posts as $post){
                $contents = $post;

                $view .= view('layouts.parts.custom.otherarticle', compact('contents', 'gender'))->render();
            }
            return response()->json(['html'=>$view]);
        }

        return view('others.store', compact('posts', 'gender'));
    }


}
