<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTokensTable extends Migration
{
    /**
     * タグ部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_tokens", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時

            $table->string("tel", 15)->comment("電話番号")->index();
            $table->string("email")->comment("メールアドレス")->nullable(true)->default("")->index();
            $table->string("token")->comment("トークン")->default("")->nullable(true)->index();
            $table->string("token_sns")->comment("SNSのトークン")->default("")->nullable(true)->index();
            $table->integer("is_expert")->comment("専門家か	")->default(0)->nullable(true)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("user_tokens");
    }
}
