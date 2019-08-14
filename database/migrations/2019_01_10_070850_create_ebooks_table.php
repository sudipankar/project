<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ebook_title');
            $table->text('ebook_desc');
            $table->string('ebook');
            $table->integer('professions_id')->unsigned()->index();
            $table->foreign('professions_id')->references('id')->on('professions')->onDelete('cascade');
            $table->float('price');
            $table->string('ebook_pwd');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebooks');
    }
}
