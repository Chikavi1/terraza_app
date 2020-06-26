<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesBussinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_bussinesses', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('bussiness_id')->unsigned();
            $table->foreign('bussiness_id')->references('id')->on('bussinesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_bussinesses');
    }
}
