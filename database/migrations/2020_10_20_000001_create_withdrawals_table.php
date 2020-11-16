<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * 出金依頼部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("withdrawals", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("expert_id")->comment("専門家のID")->index();
            $table->integer("money")->comment("出金の金額")->index();
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
        Schema::dropIfExists("withdrawals");
    }
}
