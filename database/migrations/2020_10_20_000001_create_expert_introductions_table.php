<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateExpertIntroductionsTable extends Migration
    {
        /**
         * 相談の回答
         *
         * @return void
         */
        public function up()
        {
            Schema::create("expert_introductions", function (Blueprint $table) {
                $table->bigIncrements("id");        //ID
                $table->timestamps();                       //作成日時、更新日時
                $table->softDeletes();                      //削除日時

                $table->bigInteger("expert_id")->comment("専門家のID")->index();
                $table->bigInteger("user_id")->comment("ユーザーのID")->index();
                $table->integer("money")->comment("紹介料")->index();
                $table->integer("status")->comment("ステータス")->index();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists("expert_introductions");
        }
    }
