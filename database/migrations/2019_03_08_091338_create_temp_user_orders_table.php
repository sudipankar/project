<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_user_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_ip', 45);
            $table->integer('ebook_id')->unsigned()->index();
            $table->foreign('ebook_id')->references('id')->on('ebooks')->onDelete('cascade');
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
        Schema::dropIfExists('temp_user_orders');
    }
}
