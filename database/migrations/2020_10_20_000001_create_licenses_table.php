<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * ユーザー部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("licenses", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時


            $table->integer("license_category_id")->comment("資格のカテゴリとの紐付け")->index();
            $table->string("license_name", 255)->comment("資格名")->default("")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("licenses");
    }
}
