<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade');
            $table->unsignedInteger('badge_id');
            $table->foreign('badge_id')
                ->references('id')->on('badges')
                ->onDelete('cascade');
            $table->tinyInteger('when')->unsigned();
            $table->index(['question_id', 'badge_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question_actions');
    }
}
