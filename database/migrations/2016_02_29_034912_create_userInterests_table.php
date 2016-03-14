<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_interesting_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('interesting_field_id')->unsigned();
            $table->integer('interactivity_factor')->default(0);
            $table->boolean('added')->default(false);
            
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->foreign('interesting_field_id')->references('id')->on('interesting_fields')->onDelete('cascade');
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
        Schema::drop('users_Interests');
    }
}
