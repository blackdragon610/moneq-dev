<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * 相談
     *
     * @return void
     */
    public function up()
    {
        Schema::create("posts", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("user_id")->comment("質問したユーザー")->index();
            $table->integer("status")->comment("ステータス")->default("1");
            $table->string("post_name")->comment("相談のタイトル")->index();
            $table->integer("sub_category_id")->comment("カテゴリ")->index();
            $table->text("body")->comment("相談内容");
            $table->bigInteger("post_answer_id")->comment("解決した相談の回答のID")->index()->default(0);
            $table->integer("count_answer")->comment("回答数")->index()->default(0);
            $table->integer("count_usuful")->comment("参考になった数")->index()->default(0);
            $table->integer("count_access")->comment("閲覧数")->index()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("posts");
    }
}
