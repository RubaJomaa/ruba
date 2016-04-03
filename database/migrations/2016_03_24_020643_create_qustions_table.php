<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQustionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longtext('question_body');
            $table->integer('topic_id');
          //  $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade'); //هاااد سطر ابن كلب :( 
            $table->boolean('answered')->default(false);
            $table->string('title');
            $table->integer('answers_count')->unsigned();//i have added this, to indicate the number of answers for this question
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
        Schema::drop('questions');
    }
}
