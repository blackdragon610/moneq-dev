<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseCategoriesTable extends Migration
{
    /**
     * ユーザー部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("license_categories", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->string("category_name", 255)->comment("資格のカテゴリ名")->default("")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("license_categories");
    }
}
