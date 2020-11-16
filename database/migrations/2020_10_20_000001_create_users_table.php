<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * ユーザー部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時
            $table->rememberToken();

            $table->string("nickname", 255)->comment("ニックネーム")->default("")->index();
            $table->string("email", 255)->comment("メールアドレス")->default("")->index();
            $table->string("tel", 15)->comment("電話番号")->default("")->index();
            $table->string("password", 255)->comment("パスワード")->default("")->index();
            $table->string("token_sns", 255)->comment("SNSのトークン")->default("")->index();
            $table->integer("gender")->comment("性別")->default(0)->index();
            $table->date("date_birth")->comment("生年月日")->nullable(true)->index();
            $table->integer("prefecture")->comment("お住まいの都道府県")->nullable(true)->index();
            $table->integer("job")->comment("職業")->nullable(true)->index();
            $table->integer("marriage")->comment("婚姻状況")->nullable(true)->index();
            $table->integer("child")->comment("子供人数")->nullable(true)->index();
            $table->string("trouble", 100)->comment("お金についての悩み")->nullable(true)->index();
            $table->integer("income")->comment("世帯収入")->nullable(true)->index();
            $table->string("family", 100)->comment("世帯収入")->nullable(true)->index();
            $table->integer("live")->comment("住まい")->nullable(true)->index();
            $table->string("token_auto", 100)->comment("自動ログイントークン")->nullable(true)->index();
            $table->integer("is_send_answer")->comment("回答通知の送信の有無")->default(1)->index();
            $table->integer("is_send_message")->comment("メッセージの送信の有無")->default(1)->index();
            $table->integer("is_send_master")->comment("MoneQの送信の有無")->default(1)->index();
            $table->integer("pay_status")->comment("会員の種別")->default(1)->index();
            $table->string("order_id")->comment("継続決済ID")->nullable(true)->index();
            $table->bigInteger("expend_id")->comment("紹介した専門家のID")->nullable(true)->index();
            $table->integer("re_point")->comment("再質問権")->default(0)->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users");
    }
}
