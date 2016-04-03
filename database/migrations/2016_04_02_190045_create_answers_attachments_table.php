<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answer_id')->unsigned();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->integer('attachment_id')->unsigned();
            $table->foreign('attachment_id')->references('id')->on('attachments')->onDelete('cascade');
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
        Schema::drop('answers_attachments');
    }
}
