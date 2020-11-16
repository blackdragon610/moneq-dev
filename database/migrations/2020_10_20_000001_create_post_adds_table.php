<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostAddsTable extends Migration
{
    /**
     * 相談の回答
     *
     * @return void
     */
    public function up()
    {
        Schema::create("post_adds", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("post_id")->comment("相談のID")->index();
            $table->bigInteger("user_id")->comment("ユーザーのID")->index();
            $table->text("body")->comment("相談の追記内容");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("post_adds");
    }
}
