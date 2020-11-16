<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeTokensTable extends Migration
{
    /**
     * PUSH通知用のユーザーのデバイストークン
     *
     * @return void
     */
    public function up()
    {
        Schema::create("change_tokens", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時

            $table->bigInteger("user_id")->comment("ユーザーのID")->index();
            $table->bigInteger("expert_id")->comment("専門家のID")->index();
            $table->string("token")->comment("トークン")->default("");
            $table->integer("type")->comment("種類")->index();
            $table->text("value")->comment("値");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("change_tokens");
    }
}
