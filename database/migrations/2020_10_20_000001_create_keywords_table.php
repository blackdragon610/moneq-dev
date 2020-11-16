<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * キーワード部分
     *
     * @return void
     */
    public function up()
    {
        Schema::create("keywords", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時

            $table->string("keyword", 255)->comment("キーワード")->index();
            $table->integer("count_keyword")->comment("検索数")->default("0")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("keywords");
    }
}
