<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * 相談の回答
     *
     * @return void
     */
    public function up()
    {
        Schema::create("experts", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時
            $table->rememberToken();

            $table->string("expert_name_second", 100)->comment("氏名(姓)")->index();
            $table->string("expert_name_first", 100)->comment("氏名(名)")->index();
            $table->string("expert_name_kana_second", 100)->comment("氏名フリガナ(姓)")->index();
            $table->string("expert_name_kana_first", 100)->comment("氏名フリガナ(名)")->index();
            $table->integer("gender")->comment("性別")->index();
            $table->date("date_birth")->comment("生年月日")->index();
            $table->string("email")->comment("メールアドレス")->index();
            $table->string("password")->comment("パスワード")->index();
            $table->string("image", 30)->comment("顔写真")->index();
            $table->integer("prefecture_area")->comment("対応エリア")->index();
            $table->date("date_start")->comment("業務開始年月")->index();
            $table->integer("specialtie_id")->comment("得意分野")->index();
            $table->text("body")->comment("自己紹介");
            $table->string("zip", 8)->comment("所在地");
            $table->integer("prefecture")->comment("都道府県")->index();
            $table->text("address")->comment("所在地");
            $table->integer("count_useful")->comment("役にたったのカウント")->default(0)->index();
            $table->integer("count_answer")->comment("回答数のカウント")->default(0)->index();
            $table->float("evaluation", 14,1)->comment("役にたったのカウント")->default(0)->index();
            $table->string("bank_name")->comment("銀行名")->index();
            $table->string("bank_code", 10)->comment("銀行コード")->index();
            $table->string("branch_name")->comment("支店名")->index();
            $table->string("branch_code", 10)->comment("支店コード")->index();
            $table->integer("bank_type")->comment("口座種別")->index();
            $table->string("bank_number", 10)->comment("口座番号")->index();
            $table->string("bank_person_name")->comment("口座名義")->index();

            $table->bigInteger("ranking_access")->comment("回答ページ閲覧")->index()->default(0);
            $table->bigInteger("ranking_page_access")->comment("専門家ページ閲覧")->index()->default(0);
            $table->bigInteger("ranking_message")->comment("個別相談")->index()->default(0);
            $table->bigInteger("ranking_introduction")->comment("紹介人数")->index()->default(0);
            $table->bigInteger("ranking_introduction_money")->comment("紹介金額")->index()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("experts");
    }
}
