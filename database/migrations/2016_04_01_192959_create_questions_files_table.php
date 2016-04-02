<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_files', function (Blueprint $table) {
            $table->increments('id');
          //$table->integer('question_file_middle_id')->unsigned();
          //$table->foreign('question_file_middle_id')->references('id')->on('questions_files_middle')->onDelete('cascade');
            $table->string('file_name');
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
        Schema::drop('questions_files');
    }
}
