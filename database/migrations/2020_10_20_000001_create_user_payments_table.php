<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentsTable extends Migration
{
    /**
     * PUSH通知用のユーザーのデバイストークン
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_payments", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("user_id")->comment("ユーザーのID")->index();
            $table->string("order_id")->comment("決済のID")->index();
            $table->integer("price")->comment("決済料金")->index();
            $table->integer("type")->comment("決済の種類")->index();
            $table->integer("kind")->comment("決済の種類")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("user_payments");
    }
}
