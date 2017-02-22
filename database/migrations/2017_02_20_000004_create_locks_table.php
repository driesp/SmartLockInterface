<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('locks', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('floor_id')->unsigned()->nullable();
          $table->foreign('floor_id')->references('id')->on('floors')->onDelete('set null');
          $table->string('room')->unique();
          $table->string('address')->unique();
          $table->string('password');
          $table->integer('x1x')->nullable();
          $table->integer('x1y')->nullable();
          $table->integer('x2x')->nullable();
          $table->integer('x2y')->nullable();
          $table->integer('x3x')->nullable();
          $table->integer('x3y')->nullable();
          $table->integer('x4x')->nullable();
          $table->integer('x4y')->nullable();
          $table->boolean('active')->default(false);
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
        Schema::dropIfExists('locks');
    }
}
