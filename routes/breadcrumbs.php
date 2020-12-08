<?php


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

Breadcrumbs::for('top', function ($trail) {
    $trail->push('Home', action('TopController@index'));
});

Breadcrumbs::for('search.tema', function ($trail) {
    $trail->parent('top');
    $trail->push('お金の相談テーマから探す" の検索結果', route('search.tema'));
});

Breadcrumbs::for('search.category', function ($trail) {
    $trail->parent('top');
    $trail->push('"category" の検索結果', route('search.category'));
});

Breadcrumbs::for('search.expert', function ($trail) {
    $trail->parent('top');
    $trail->push('"expert" の検索結果', route('search.expert'));
});


Breadcrumbs::for('post.detail', function ($trail, $postId) {
    // dd(\URL::previous());
    $trail->parent('search.tema');
    $trail->push('post detail', route('post.detail', $postId));
});

Breadcrumbs::for('expert.detail.post', function ($trail, $expertId, $postId) {
    $trail->parent('post.detail', $postId);
    $trail->push('expert detail', route('expert.detail', $expertId));
});
