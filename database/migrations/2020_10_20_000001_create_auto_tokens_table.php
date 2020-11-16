<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoTokensTable extends Migration
{
    /**
     * タグ部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("auto_tokens", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時

            $table->bigInteger("user_id")->comment("ユーザーID")->index()->nullable(true);
            $table->bigInteger("expert_id")->comment("専門家ID")->index()->nullable(true);
            $table->string("token", 100)->comment("自動ログイントークン")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("auto_tokens");
    }
}
