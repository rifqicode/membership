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
          $table->integer('id_users');
          $table->string('image')->default('default.jpg');
          $table->string('full_name');
          $table->string('birthdate');
          $table->string('address');
          $table->string('contact');
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
        Schema::dropIfExists('detail_users');
    }
}
