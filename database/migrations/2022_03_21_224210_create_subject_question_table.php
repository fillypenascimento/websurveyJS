<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubjectQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_question', function (Blueprint $table) {
            // $table->charset = 'utf8';
            // $table->collation = 'utf8_general_ci';
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('subject_answer')->nullable();
            $table->float('subject_time',9,3)->nullable();
            $table->tinyInteger('is_correct')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->tinyInteger('has_changed_page')->nullable();
            $table->index('subject_id');
            $table->index('question_id');
            $table->unique(['subject_id', 'question_id'], 'unique_index');
        });

        // Schema::table('subject_question', function (Blueprint $table) {
        //     DB::statement('alter table `subject_question` add column `subject_time` float null after subject_answer');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('subject_question');
        Schema::dropIfExists('subject_question', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['question_id']);
            $table->dropUnique('unique_index');
            $table->dropIndex('subject_question_subject_id_index');
            $table->dropIndex('subject_question_question_id_index');
        });
    }
}
