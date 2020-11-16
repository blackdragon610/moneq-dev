<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDeviceTokensTable extends Migration
{
    /**
     * PUSH通知用のユーザーのデバイストークン
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_device_tokens", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時

            $table->bigInteger("user_id")->comment("ユーザーのID")->index();
            $table->text("device_token")->comment("デバイストークン")->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("user_device_tokens");
    }
}
