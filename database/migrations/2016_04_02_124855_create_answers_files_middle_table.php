<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersFilesMiddleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_files_middle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answer_id')->unsigned();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->integer('answer_file_id')->unsigned();
            $table->foreign('answer_file_id')->references('id')->on('answers_files')->onDelete('cascade');
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
        Schema::drop('answers_files_middle');
    }
}
