<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ground_id')->unsigned()->nullable();
            $table->foreign('ground_id')->references('id')->on('grounds')->onDelete('cascade');
            $table->integer('x1x');
            $table->integer('x1y');
            $table->integer('x2x');
            $table->integer('x2y');
            $table->integer('x3x');
            $table->integer('x3y');
            $table->integer('x4x');
            $table->integer('x4y');
            $table->string('name');
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
        Schema::dropIfExists('buildings');
    }
}
