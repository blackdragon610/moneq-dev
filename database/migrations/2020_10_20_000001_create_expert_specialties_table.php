<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertSpecialtiesTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create("expert_specialties", function (Blueprint $table) {
            $table->bigIncrements("id");        //ID
            $table->timestamps();                       //作成日時、更新日時
            $table->softDeletes();                      //削除日時

            $table->bigInteger("expert_id")->comment("専門家のID")->index();
            $table->integer("specialtie_id")->comment("対応可能分野のID")->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("expert_specialties");
    }
}
