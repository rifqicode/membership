<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function(Blueprint $table){
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->string('image')->default('default.jpg');
          $table->string('full_name');
          $table->date('birthdate');
          $table->string('address');
          $table->string('contact');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_users');
    }
}
