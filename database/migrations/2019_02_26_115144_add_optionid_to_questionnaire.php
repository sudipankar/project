<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionidToQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionaires', function (Blueprint $table) {
            //Add option id to the question
            $table->integer('option_id')->unsigned()->nullable();
            $table->foreign('option_id')->references('id')->on('questionnaire_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire', function (Blueprint $table) {
            //
        });
    }
}
