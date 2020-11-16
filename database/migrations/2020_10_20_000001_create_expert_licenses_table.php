<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertLicensesTable extends Migration
{
    /**
     * 相談の回答
     *
     * @return void
     */
    public function up()
    {
        Schema::create("expert_licenses", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("expert_id")->comment("専門家のID")->index();
            $table->integer("license_id")->comment("保有資格のID")->index();
            $table->text("body")->comment("資格の自由記述");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("expert_licenses");
    }
}
